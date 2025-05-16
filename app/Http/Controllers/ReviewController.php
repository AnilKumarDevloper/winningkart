<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Auth;
use App\Models\OrderDetail;
use Symfony\Component\Routing\Matcher\ExpressionLanguageProvider;

class ReviewController extends Controller
{
    public function __construct()
    {
        // Staff Permission Check
        $this->middleware(['permission:view_product_reviews'])->only('index');
        $this->middleware(['permission:publish_product_review'])->only('updatePublished');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $reviews = Review::query();
        if ($request->rating) {
            $reviews->orderBy('rating', explode(",", $request->rating)[1]);
        }
        $reviews = $reviews->orderBy('created_at', 'desc')->paginate(15);
        return view('backend.product.reviews.index', compact('reviews'));
    }


    public function viewAllReviwsOfProduct($slug){
        try{
            $detailedProduct  = Product::with('reviews', 'brand', 'stocks', 'user', 'user.shop')
            ->where('auction_product', 0)
            ->where('slug', $slug)
            ->where('approved', 1)->first();
            $reviews = Review::with('user')->where('product_id', $detailedProduct->id)->orderBy('rating', 'desc')->get();
            $review_status = 0;
            if (Auth::check()) {
                $OrderDetail = OrderDetail::with(['order' => function ($q) {
                    $q->where('user_id', Auth::id());
                }])->where('product_id', $detailedProduct->id)->where('delivery_status', 'delivered')->first();
                $review_status = $OrderDetail ? 1 : 0;
            }
            return view('frontend.new_changes.all_reviews', compact('detailedProduct', 'reviews', 'review_status'));
        }catch(\Exception $e){
            abort('500');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Review;
        $review->product_id = $request->product_id;
        $review->user_id = Auth::user()->id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->photos = implode(',', $request->photos);
        $review->viewed = '0';
        $review->save();
        $product = Product::findOrFail($request->product_id);
        if (Review::where('product_id', $product->id)->where('status', 1)->count() > 0) {
            $product->rating = Review::where('product_id', $product->id)->where('status', 1)->sum('rating') / Review::where('product_id', $product->id)->where('status', 1)->count();
        } else {
            $product->rating = 0;
        }
        $product->save();

        if ($product->added_by == 'seller') {
            $seller = $product->user->shop;
            $seller->rating = (($seller->rating * $seller->num_of_reviews) + $review->rating) / ($seller->num_of_reviews + 1);
            $seller->num_of_reviews += 1;
            $seller->save();
        }

        flash(translate('Review has been submitted successfully'))->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updatePublished(Request $request)
    {
        $review = Review::findOrFail($request->id);
        $review->status = $request->status;
        $review->save();

        $product = Product::findOrFail($review->product->id);
        if (Review::where('product_id', $product->id)->where('status', 1)->count() > 0) {
            $product->rating = Review::where('product_id', $product->id)->where('status', 1)->sum('rating') / Review::where('product_id', $product->id)->where('status', 1)->count();
        } else {
            $product->rating = 0;
        }
        $product->save();
        if ($product->added_by == 'seller') {
            $seller = $product->user->shop;
            if ($review->status) {
                $seller->rating = (($seller->rating * $seller->num_of_reviews) + $review->rating) / ($seller->num_of_reviews + 1);
                $seller->num_of_reviews += 1;
            } else {
                $seller->rating = (($seller->rating * $seller->num_of_reviews) - $review->rating) / max(1, $seller->num_of_reviews - 1);
                $seller->num_of_reviews -= 1;
            }
            $seller->save();
        }
        return 1;
    }

    public function product_review_modal(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        $review = Review::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
        return view('frontend.user.product_review_modal', compact('product', 'review'));
    }

    public function getAllReviewOnProductPage(Request $request){
        try{
            $review_data = [];
            $reviews = Review::with('user:id,name')->where('product_id', $request->product_id)->get();
            foreach($reviews as $review){
                $images_ids = explode(',', $review->photos);
                $images = Upload::select('file_name')->whereIn('id', $images_ids)->get();
                  $img = [];
                foreach($images as $image){
                $img[] = $image->file_name;
               }
                $review_data[] = [
                    "images" => $img,
                    "review" => $review
                ];
            }
            return response()->json([
                "status_message" => "success",
                "data" => $review_data
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status_message" => 'something_went_wrong',
                "error" => $e->getMessage(),
            ], 500);
        }
    }
}
