<div class="bg-white mb-4 border p-3 p-sm-4">
    <!-- Tabs -->
    <div class="nav aiz-nav-tabs">
        <a href="#tab_default_1" data-toggle="tab"
            class="mr-5 pb-2 fs-16 fw-700 text-reset active show">{{ translate('Description') }}</a>
        @if ($detailedProduct->video_link != null)
            <a href="#tab_default_2" data-toggle="tab"
                class="mr-5 pb-2 fs-16 fw-700 text-reset">{{ translate('Video') }}</a>
        @endif
        @if ($detailedProduct->pdf != null)
            <a href="#tab_default_3" data-toggle="tab"
                class="mr-5 pb-2 fs-16 fw-700 text-reset">{{ translate('Downloads') }}</a>
        @endif
    </div>

    <!-- Description -->
    <div class="tab-content pt-0">
        <!-- Description -->
        <!--<div class="tab-pane fade active show" id="tab_default_1">
            <div class="py-5">
                <div class="mw-100 overflow-hidden text-left aiz-editor-data">
                    <?php echo $detailedProduct->getTranslation('description'); ?>
                </div>
            </div>
        </div>-->
        
        <div class="tab-pane fade active show" id="tab_default_1"> 
    <div class="py-5">
        <div class="mw-100 overflow-hidden text-left aiz-editor-data">
            <div class="description-content">
                <?php echo $detailedProduct->getTranslation('description'); ?>
            </div>
            <a href="javascript:void(0)" class="read-more-btn">Read More</a>
        </div>
    </div>
</div>

<!-- Add the following styles and script -->
<style>
    .description-content {
        overflow: hidden;
        max-height: 100px; /* Adjust height as needed */
        transition: max-height 0.3s ease;
    }
    .description-content.full {
        max-height: none;
    }
    .read-more-btn {
        display: block;
        margin-top: 10px;
        color: #007bff;
        cursor: pointer;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".read-more-btn").click(function() {
            var $content = $(this).siblings('.description-content');
            if ($content.hasClass('full')) {
                // Collapse the content
                $content.removeClass('full').css('max-height', '100px');
                $(this).text('Read More');
            } else {
                // Expand the content
                $content.addClass('full').css('max-height', 'none');
                $(this).text('Read Less');
            }
        });
    });
</script>


        <!-- Video -->
        <div class="tab-pane fade" id="tab_default_2">
            <div class="py-5">
                <div class="embed-responsive embed-responsive-16by9">
                    @if ($detailedProduct->video_provider == 'youtube' && isset(explode('=', $detailedProduct->video_link)[1]))
                        <iframe class="embed-responsive-item"
                            src="https://www.youtube.com/embed/{{ get_url_params($detailedProduct->video_link, 'v') }}"></iframe>
                    @elseif ($detailedProduct->video_provider == 'dailymotion' && isset(explode('video/', $detailedProduct->video_link)[1]))
                        <iframe class="embed-responsive-item"
                            src="https://www.dailymotion.com/embed/video/{{ explode('video/', $detailedProduct->video_link)[1] }}"></iframe>
                    @elseif ($detailedProduct->video_provider == 'vimeo' && isset(explode('vimeo.com/', $detailedProduct->video_link)[1]))
                        <iframe
                            src="https://player.vimeo.com/video/{{ explode('vimeo.com/', $detailedProduct->video_link)[1] }}"
                            width="500" height="281" frameborder="0" webkitallowfullscreen
                            mozallowfullscreen allowfullscreen></iframe>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Download -->
        <div class="tab-pane fade" id="tab_default_3">
            <div class="py-5 text-center ">
                <a href="{{ uploaded_asset($detailedProduct->pdf) }}"
                    class="btn btn-primary">{{ translate('Download') }}</a>
            </div>
        </div>
    </div>
</div>