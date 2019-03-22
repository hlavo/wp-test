<?

add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );

function theme_settings_page()
{
?>
<div class="wrap">
    <h1>Theme Panel</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields("section");
        do_settings_sections("theme-options");
        submit_button();
        ?>
    </form>
</div>
<?php
}

function display_search_element()
{
    ?>
    <input type="text" name="search_img" id="search_img" value="<?php echo esc_attr( get_option( 'search_img' ) ); ?>">
    <a class="button" onclick="upload_image('search_img');">Upload Hero</a>

    <script>
        var uploader;
        function upload_image(id) {

            //Extend the wp.media object
            uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });

            //When a file is selected, grab the URL and set it as the text field's value
            uploader.on('select', function() {
                attachment = uploader.state().get('selection').first().toJSON();
                var url = attachment['url'];
                jQuery('#'+id).val(url);
            });

            //Open the uploader dialog
            uploader.open();
        }
    </script>
    <?php
}



function display_fb_element()
{
    ?>
    <input type="url" name="fb" id="fb" value="<?php echo esc_attr( get_option( 'fb' ) ); ?>">
    <?php
}

function display_contact_element()
{
    ?>
    <input type="email" name="contact" id="contact" value="<?php echo esc_attr( get_option( 'contact' ) ); ?>">
    <?php
}



function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");

    add_settings_field("contact", "Kontaktný mail", "display_contact_element", "theme-options", "section");
    add_settings_field("fb", "Facebook", "display_fb_element", "theme-options", "section");
    add_settings_field("search_img", "Search result - hero", "display_search_element", "theme-options", "section");

    register_setting("section", "search_img");
    register_setting("section", "fb");
    register_setting("section", "contact");
}

add_action("admin_init", "display_theme_panel_fields");


function add_theme_menu_item()
{
    add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");