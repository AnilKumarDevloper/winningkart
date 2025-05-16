                            @foreach ($products as $key => $product)
                                    <!-- <div class="col border-right border-bottom has-transition hov-shadow-out z-1"> -->
                                    <div class="col-md-4 p-0"> 
                                        @include('frontend.new_changes.partials.single_product_box', ['product' => $product]) 
                                    <!-- </div> -->
                                    </div>
                                @endforeach  