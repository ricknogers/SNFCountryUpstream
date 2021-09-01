<?php
function my_acf_admin_head() {
        $module_images_path = get_template_directory_uri() . '/modules/images/';
        $placeholder = get_template_directory_uri() . '/modules/images/no-preview.jpg';
    ?>
    <style type="text/css">
        .imagePreview { position:absolute; right:100%; top:0px; z-index:999999; border:1px solid #f2f2f2; box-shadow:0px 0px 3px #b6b6b6; background-color:#fff; padding:20px;}
        .imagePreview img { width:300px; height:auto; display:block; }
        .acf-tooltip li:hover { background-color:#0074a9; }
    </style>
    <script>
        jQuery(document).ready(function($) {
            function checkImage(urlToFile) {
                var xhr = new XMLHttpRequest();
                xhr.open('HEAD', urlToFile, false);
                xhr.send();
                if (xhr.status == "404") {
                    return false;
                } else {
                    return true;
                }
            }
            $('a[data-name=add-layout]').click(function(){
                waitForEl('.acf-tooltip li', function() {
                    $('.acf-tooltip li a').hover(function(){
                        imageTP = $(this).attr('data-layout');
                        imageFullPath = "<?php echo $module_images_path; ?>" + imageTP + '.jpg';
                        imagePlaceholder = "<?php echo $placeholder; ?>";
                        link = (checkImage(imageFullPath)) ? imageFullPath : imagePlaceholder;
                        $('.acf-tooltip').append('<div class="imagePreview"><img src="' + link + '"></div>');
                    }, function(){
                        $('.imagePreview').remove();
                    });
                });
            });
            var waitForEl = function(selector, callback) {
                if (jQuery(selector).length) {
                    callback();
                } else {
                    setTimeout(function() {
                        waitForEl(selector, callback);
                    }, 100);
                }
            };
        });
    </script>
    <?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');