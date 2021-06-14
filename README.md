# siteorigin-widget-bundle-image-caption-extension
Extends the SiteOrigin Widgets Bundle by extending the Image widget to include a caption feature.

Instructions: 

1. Back up the current version of your website
2. Open your website directory and navigate to `~/app/public/wp-content/plugins/so-widgets-bundle/widgets/`
3. Within the widgets directory, delete and replace the image folder with the `image` folder in this repository\
4. Add the code below to the bottom of `functions.php`
5. Save and reload your site
6. You should now have the ability to set up an image caption and align it left, right, or center to the image

CSS Classes:
`.sow-image-caption-container`
`.sow-image-caption`

TO DO:
- [ ] Refactor
- [ ] Remove inline width style and feed it through .less file
- [ ] Once refactored, submit to SO as PR

Add this code to functions.php within the Theme being used (note: suggest using child theme):
```php
function mytheme_extend_image_form_caption($form_options, $widget)
{
    // Split form_options
    $form_options_slice_to_six = array_slice($form_options, 0, 6);
    $form_options_slice_after_six = array_slice($form_options, 6);

    // Prep items to insert into form_options
    $insert_array_caption = ['caption' => [
        'type' => 'text',
        'label' => __('Caption text', 'so-widgets-bundle'),
    ]
    ];
    $insert_array_caption_text = ['caption_align' => [
        'type' => 'select',
        'label' => __('Caption alignment', 'so-widgets-bundle'),
        'default' => 'hidden',
        'options' => [
            'default' => __('Default', 'so-widgets-bundle'),
            'left' => __('Left', 'so-widgets-bundle'),
            'right' => __('Right', 'so-widgets-bundle'),
            'center' => __('Center', 'so-widgets-bundle'),
        ]
    ]
    ];

    // Merge caption items into form_options
    $form_options = array_merge(
        $form_options_slice_to_six,
        $insert_array_caption,
        $insert_array_caption_text,
        $form_options_slice_after_six
    );

    return $form_options;
}
add_filter('siteorigin_widgets_form_options_sow-image', 'mytheme_extend_image_form_caption', 10, 2);
```
