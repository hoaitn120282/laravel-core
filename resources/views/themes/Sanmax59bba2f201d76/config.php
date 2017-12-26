<?php
/*
|--------------------------------------------------------------------------
| Config Theme Clinic medium
|--------------------------------------------------------------------------
| require on config theme :
| - name => @string
| - version => @string
| - author => @string
| - author_url => @string
| - description => @string
| - image_preview => @string
| - options => @array
|   - name => @string
|   - type => imageupload | text | textarea | combobox
|   - *option => if type combobox else not require
|   - value => @string
|   - label => @string
| - widget_position => @array
| - menu_position => @array
*/
return [
   /*
    *
    * General Theme
    *
    */
    'name' => 'Clinic medium',
    'version' => '1.0.0',
    'author' => 'Sanmax',
    'author_url' => '#',
    'theme_type_id' => 2,
    'description' => 'site medium template',
    'image_preview' => 'preview.jpg',

   /*
    *
    * Set menu position on theme
    *
    */
    'menu_position' => ['top-menu'],

   /*
    *
    * Set widget position on theme
    *
    */
    'widget_position' => ['post_slider', 'top_content', 'bottom_content', 'left_sidebar', 'right_sidebar'],

   /*
    *
    * Set Theme Options
    *
    */
    "options" => [
        // Configurations general
        "general" => [
            [
                'name' => 'logo',
                'type' => 'input_upload',
                'value' => '',
                'label' => 'Logo',
            ],
            [
                'name' => 'background_image',
                'type' => 'input_upload',
                'value' => '',
                'label' => 'Feature image',
            ],
            [
                'name' => 'copyright',
                'type' => 'text',
                'value' => 'Copyright &copy; 2016 Sanmax',
                'label' => 'Copyright Text',
            ],
            [
                'name' => 'customcss',
                'type' => 'textarea',
                'value' => '',
                'label' => 'Custom CSS',
            ],
        ],
        // Configurations social media
        "social_media" => [
            [
                'name' => 'facebook',
                'type' => 'text',
                'value' => '',
                'label' => 'Facebook',
            ],
            [
                'name' => 'twitter',
                'type' => 'text',
                'value' => '',
                'label' => 'Twitter',
            ],
            [
                'name' => 'google_plus',
                'type' => 'text',
                'value' => '',
                'label' => 'Google Plus',
            ],
            [
                'name' => 'youtube',
                'type' => 'text',
                'value' => '',
                'label' => 'Youtube',
            ],
        ],
        // Configurations layouts
        "layouts"=>[
			[
				'name'=>'layout_style',
                'type'=>'combobox',
                'options'=>[
                    'right-sidebar'=>'Right Sidebar',
                    'left-sidebar'=>'Left Sidebar',
                    'none-sidebar'=>'None Sidebar',
                    'center-content'=>'Center Content',
                ],
                'value'=>[
                    'right-sidebar'=>'Right Sidebar',
                    'left-sidebar'=>'Left Sidebar',
                    'none-sidebar'=>'None Sidebar',
                    'center-content'=>'Center Content',
                ],
                'xvalue' => ['default'=>'right-sidebar'],
                'label'=>'Layout Style',
			]
		],
        // Configurations typography
        "typography" => [
            // Site title
            [
                "name" => "site_title",
                "label" => "Site title",
                "type" => "fieldset",
                "items" => [
                    [
                        "name" => "color",
                        "label" => "Text color",
                        "value" => "#222222",
                        "type" => "colorpicker"
                    ],
                    [
                        "name" => "font_family",
                        "label" => "Font family",
                        "value" => "Raleway-Black",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    [
                        "name" => "font_size",
                        "label" => "Font size",
                        "value" => "30px",
                        "type" => "combobox",
                        "options" => [
                            "25px" => "25px",
                            "26px" => "26px",
                            "27px" => "27px",
                            "28px" => "28px",
                            "29px" => "29px",
                            "30px" => "30px",
                            "31px" => "31px",
                            "32px" => "32px",
                            "33px" => "33px",
                            "34px" => "34px",
                            "35px" => "35px",
                        ]
                    ],
                ]
            ],
            // Slogan
            [
                "name" => "slogan",
                "label" => "Slogan",
                "type" => "fieldset",
                "items" => [
                    [
                        "name" => "color",
                        "label" => "Text color",
                        "value" => "#222222",
                        "type" => "colorpicker"
                    ],
                    [
                        "name" => "font_family",
                        "label" => "Font family",
                        "value" => "Raleway-Medium",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    [
                        "name" => "font_size",
                        "label" => "Font size",
                        "value" => "16px",
                        "type" => "combobox",
                        "options" => [
                            "12px" => "12px",
                            "13px" => "13px",
                            "14px" => "14px",
                            "25px" => "25px",
                            "16px" => "16px",
                            "17px" => "17px",
                            "18px" => "18px",
                            "19px" => "19px",
                            "20px" => "20px",
                            "21px" => "21px",
                            "22px" => "22px",
                        ]
                    ],
                ]
            ],
            // Text (Page)
            [
                "name" => "page",
                "label" => "Text",
                "type" => "fieldset",
                "items" => [
                    [
                        "name" => "color",
                        "label" => "Text color",
                        "value" => "#222222",
                        "type" => "colorpicker"
                    ],
                    [
                        "name" => "font_family",
                        "label" => "Font family",
                        "value" => "Raleway-Medium",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    [
                        "name" => "font_size",
                        "label" => "Font size",
                        "value" => "14px",
                        "type" => "combobox",
                        "options" => [
                            "12px" => "12px",
                            "13px" => "13px",
                            "14px" => "14px",
                            "25px" => "25px",
                            "16px" => "16px",
                            "17px" => "17px",
                            "18px" => "18px",
                            "19px" => "19px",
                            "20px" => "20px",
                            "21px" => "21px",
                            "22px" => "22px",
                        ]
                    ],
                ]
            ],
            // Link
            [
                "name" => "link",
                "label" => "Link",
                "type" => "fieldset",
                "items" => [
                    [
                        "name" => "color",
                        "label" => "Text color",
                        "value" => "#222222",
                        "type" => "colorpicker",
                    ],
                    [
                        "name" => "font_family",
                        "label" => "Font family",
                        "value" => "Raleway-Black",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    [
                        "name" => "font_size",
                        "label" => "Font size",
                        "value" => "12px",
                        "type" => "combobox",
                        "options" => [
                            "10px" => "10px",
                            "11px" => "11px",
                            "12px" => "12px",                            
                            "13px" => "13px",
                            "14px" => "14px",
                            "25px" => "25px",
                            "16px" => "16px",
                            "17px" => "17px",
                            "18px" => "18px",
                            "19px" => "19px",
                            "20px" => "20px",
                        ]
                    ],
                    [
                        "name" => "hover_color",
                        "label" => "Hover color",
                        "value" => "#c2c7d1",
                        "type" => "colorpicker",
                    ],
                ]
            ],
            // Button
            [
                "name" => "button",
                "label" => "Button",
                "type" => "fieldset",
                "items" => [
                    [
                        "name" => "color",
                        "label" => "Text color",
                        "value" => "#ffffff",
                        "type" => "colorpicker"
                    ],
                    [
                        "name" => "hover_color",
                        "label" => "Text hover color",
                        "value" => "#222222",
                        "type" => "colorpicker"
                    ],
                    [
                        "name" => "font_family",
                        "label" => "Font family",
                        "value" => "Raleway-Medium",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    // row 2
                    [
                        "name" => "background_color",
                        "label" => "Background color",
                        "value" => "#f48100",
                        "type" => "colorpicker"
                    ],
                    [
                        "name" => "background_hover_color",
                        "label" => "Background hover color",
                        "value" => "#ffffff",
                        "type" => "colorpicker"
                    ],
                    [
                        "name" => "font_size",
                        "label" => "Font size",
                        "value" => "14px",
                        "type" => "combobox",
                        "options" => [
                            "12px" => "12px",
                            "13px" => "13px",
                            "14px" => "14px",
                            "15px" => "15px",
                            "16px" => "16px",
                            "17px" => "17px",
                            "18px" => "18px",
                            "19px" => "19px",
                            "20px" => "20px",
                            "21px" => "21px",
                            "22px" => "22px",
                        ]
                    ],
                    // row 3
                    // [
                    //     "name" => "border_color",
                    //     "label" => "Border color",
                    //     "value" => "#f48100",
                    //     "type" => "colorpicker"
                    // ],
                    // [
                    //     "name" => "border_hover_color",
                    //     "label" => "Border hover",
                    //     "value" => "#222222",
                    //     "type" => "colorpicker"
                    // ],
                ]
            ],
            // Header
            [
                "name" => "header",
                "label" => "Header",
                "type" => "fieldset",
                "items" => [
                    [
                        "name" => "color",
                        "label" => "Text color",
                        "value" => "#909090",
                        "type" => "colorpicker",
                    ],
                    [
                        "name" => "font_family",
                        "label" => "Font family",
                        "value" => "Raleway-Bold",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    [
                        "name" => "font_size",
                        "label" => "Font size",
                        "value" => "12px",
                        "type" => "combobox",
                        "options" => [
                            "10px" => "10px",
                            "11px" => "11px",
                            "12px" => "12px",
                            "13px" => "13px",
                            "14px" => "14px",
                            "15px" => "15px",
                            "16px" => "16px",
                        ]
                    ],
                    [
                        "name" => "background_color",
                        "label" => "Background color",
                        "value" => "#b3cdde",
                        "type" => "colorpicker",
                    ],
                ]
            ],
            // Footer
            [
                "name" => "footer",
                "label" => "Footer",
                "type" => "fieldset",
                "items" => [
                    [
                        "name" => "color",
                        "label" => "Text color",
                        "value" => "#ffffff",
                        "type" => "colorpicker",
                    ],
                    [
                        "name" => "font_family",
                        "label" => "Font family",
                        "value" => "Raleway-Medium",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    [
                        "name" => "font_size",
                        "label" => "Font size",
                        "value" => "12px",
                        "type" => "combobox",
                        "options" => [
                            "10px" => "10px",
                            "11px" => "11px",
                            "12px" => "12px",
                            "13px" => "13px",
                            "14px" => "14px",
                            "15px" => "15px",
                            "16px" => "16px",
                        ]
                    ],
                    [
                        "name" => "background_color",
                        "label" => "Background color",
                        "value" => "#b3cdde",
                        "type" => "colorpicker",
                    ],
                ]
            ],
            // Menu
            [
                "name" => "menu",
                "label" => "Menu",
                "type" => "fieldset",
                "xtype" => "advance",
                "items" => [
                    [
                        "name" => "color",
                        "label" => "Text color",
                        "value" => "#222222",
                        "type" => "colorpicker",
                    ],
                    [
                        "name" => "font_family",
                        "label" => "Font family",
                        "value" => "Raleway-Bold",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ],
                    ],
                    [
                        "name" => "font_size",
                        "label" => "Font size",
                        "value" => "12px",
                        "type" => "combobox",
                        "options" => [
                            "14px" => "14px",
                            "15px" => "15px",
                            "16px" => "16px",
                            "17px" => "17px",
                            "18px" => "18px",
                            "19px" => "19px",
                            "20px" => "20px",
                        ]
                    ],
                    [
                        "name" => "hover_color",
                        "label" => "Text hover",
                        "value" => "#c2c7d1",
                        "type" => "colorpicker",
                    ],
                ]
            ],
            // Slider
            [
                "name" => "slide",
                "label" => "Slide",
                "type" => "fieldset",
                "xtype" => "advance",
                "items" => [
                    [
                        "name" => "title_color",
                        "label" => "Title color",
                        "value" => "#ffffff",
                        "type" => "colorpicker"
                    ],
                    [
                        "name" => "title_font_family",
                        "label" => "Title font family",
                        "value" => "Raleway-Bold",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    [
                        "name" => "title_font_size",
                        "label" => "Title font size",
                        "value" => "50px",
                        "type" => "combobox",
                        "options" => [
                            "45px" => "45px",
                            "46px" => "46px",
                            "47px" => "47px",
                            "48px" => "48px",
                            "49px" => "49px",
                            "50px" => "50px",
                            "51px" => "51px",
                            "52px" => "52px",
                            "53px" => "53px",
                            "54px" => "54px",
                            "55px" => "55px",
                        ]
                    ],
                ] 
            ],
            // Banner
            [
                "name" => "banner",
                "label" => "Banner",
                "type" => "fieldset",
                "xtype" => "advance",
                "items" => [
                    [
                        "name" => "title_color",
                        "label" => "Title color",
                        "value" => "#ffffff",
                        "type" => "colorpicker"
                    ],
                    [
                        "name" => "title_font_family",
                        "label" => "Title font family",
                        "value" => "Raleway-Bold",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    [
                        "name" => "title_font_size",
                        "label" => "Title font size",
                        "value" => "50px",
                        "type" => "combobox",
                        "options" => [
                            "45px" => "45px",
                            "46px" => "46px",
                            "47px" => "47px",
                            "48px" => "48px",
                            "49px" => "49px",
                            "50px" => "50px",
                            "51px" => "51px",
                            "52px" => "52px",
                            "53px" => "53px",
                            "54px" => "54px",
                            "55px" => "55px",
                        ]
                    ],
                    [
                        "name" => "background_image",
                        "label" => "Background image default",
                        "value" => "",
                        "type" => "input_upload"
                    ],
                ],
            ],
            // widget
            [
                "name" => "widget",
                "label" => "Widget",
                "type" => "fieldset",
                "xtype" => "advance",
                "items" => [
                    [
                        "name" => "title_color",
                        "label" => "Title color",
                        "value" => "#222222",
                        "type" => "colorpicker",
                    ],
                    [
                        "name" => "title_font_family",
                        "label" => "Title font family",
                        "value" => "Raleway-Black",
                        "type" => "combobox",
                        "options" => [
                            "Raleway-Black" => "Raleway Black",
                            "Raleway-Bold" => "Raleway Bold",
                            "Raleway-Medium" => "Raleway Medium",
                            "Raleway-Italic" => "Raleway Italic",
                        ]
                    ],
                    [
                        "name" => "title_font_size",
                        "label" => "Title font size",
                        "value" => "30px",
                        "type" => "combobox",
                        "options" => [
                            "25px" => "25px",
                            "26px" => "26px",
                            "27px" => "27px",
                            "28px" => "28px",
                            "29px" => "29px",
                            "30px" => "30px",
                            "31px" => "31px",
                            "32px" => "32px",
                            "33px" => "33px",
                            "34px" => "34px",
                            "35px" => "35px",
                        ]
                    ],
                ]
            ],
            
        ]
    ]

];