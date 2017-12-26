<?php
/*
|--------------------------------------------------------------------------
| Config Theme Smallpine
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
	'name' => 'smallpine',
    'version' => '1.0.0',
    'author' => 'ITLSVN',
    'author_url' => 'https://www.facebook.com/hoainam.tran.355',
    'description' => 'Smallpine Theme',
	'theme_type_id' => 3,
    'image_preview' => 'preview.jpg',

    /*
    *
    * Set menu position on theme
    *
    */
    'menu_position' => ['menu-top','menu-bottom','menu-left','menu-right'],

    /*
    *
    * Set widget position on theme
    *
    */
    'widget_position' => ['post_slider','sidebar'],

    /*
    *
    * Set Theme Options
    *
    */
	"options"=>[
		"general"=>[
			[
				'name'=>'logo',
                'type'=>'imageupload',
                'value'=>'Default Theme',
                'label'=>'Logo',
            ],
			[
				'name'=>'feature_image',
                'type'=>'input_upload',
                'value'=>'http://sbd639.loc/uploads/hoangdv-log-checkout-240117.png',
                'label'=>'Feature image',
            ],
            [
				'name'=>'copyright',
                'type'=>'text',
                'value'=>'Copyright &copy; 2016 ITLSVN',
                'label'=>'Copyright Text',
            ],
            [
				'name'=>'customcss',
                'type'=>'textarea',
                'value'=>'',
                'label'=>'Custom CSS',
            ],
		],
		
		"social_media"=>[
			[
				'name'=>'facebook',
                'type'=>'text',
                'value'=>'',
                'label'=>'Facebook',
			],
			[
				'name'=>'twitter',
                'type'=>'text',
                'value'=>'',
                'label'=>'Twitter',
			],
			[
				'name'=>'google_plus',
                'type'=>'text',
                'value'=>'',
                'label'=>'Google Plus',
			],
			[
				'name'=>'youtube',
                'type'=>'text',
                'value'=>'',
                'label'=>'Youtube',
			],
		],
		
		"layouts"=>[
			[
				'name'=>'layout_style',
                'type'=>'combobox',
                'options'=>[
                    'right-sidebar'=>'Right Sidebar',
                    'left-sidebar'=>'Left Sidebar',
                    'none-sidebar'=>'None Sidebar',
                    'center-content'=>'Center Content',
                    'content'=>'Content',
                ],
                'value'=>'none-sidebar',
                'label'=>'Layout Style',
			]
		],
		"typography" => [
			[
				'name' => 'general',
				'label' => '',
				'type' => 'fieldset',
				'items' => [
					[
						'name' => 'background_image',
						'label' => 'Background image',
						'value' => 'http://sbd639.loc/uploads/hoangdv-log-checkout-240117.png',
						'type' => 'input_upload'
					],
					[
                        'name' => 'font_family',
                        'label' => 'Font family',
						'value' => 'tahoma',
                        'type' => 'combobox',
                        'options' => [
                            'arial' => 'Arial',
                            'tahoma' => 'Tahoma',
                        ]
                    ],
				]
			],
            [
                'name' => 'site_title',
                'label' => 'Site title',
				'type' => 'fieldset',
                'items' => [
                    [
                        'name' => 'color',
                        'label' => 'Color',
                        'value' => '#ff0000',
						'type' => 'colorpicker'
                    ],
                    [
                        'name' => 'font_size',
                        'label' => 'Font size',
						'value' => '16px',
                        'type' => 'combobox',
                        'options' => [
                            '14px' => '14 px',
                            '15px' => '15 px',
                            '16px' => '16 px',
                        ]
                    ],
                ]
            ],
            [
                'name' => 'sologan',
                'label' => 'Sologan',
				'type' => 'fieldset',
                'items' => [
                    [
                        'name' => 'color',
                        'label' => 'Color',
						'value' => '#cccccc',
                        'type' => 'colorpicker'
                    ],
                    [
                        'name' => 'font_size',
                        'label' => 'Font size',
						'value' => '15px',
                        'type' => 'combobox',
                        'options' => [
                            '14px' => '14 px',
                            '15px' => '15 px',
                            '16px' => '16 px',
                        ]
                    ],
                ]
            ],
            [
                'name' => 'text',
                'label' => 'Text',
				'type' => 'fieldset',
                'items' => [
                    [
                        'name' => 'color',
                        'label' => 'Color',
						'value' => '#26B99A',
                        'type' => 'colorpicker'
                    ],
                    [
                        'name' => 'font_size',
                        'label' => 'Font size',
						'value' => '15px',
                        'type' => 'combobox',
                        'options' => [
                            '14px' => '14 px',
                            '15px' => '15 px',
                            '16px' => '16 px',
                        ]
                    ],
                ]
            ],
            [
                'name' => 'link',
                'label' => 'Link',
				'type' => 'fieldset',
                'items' => [
                    [
                        'name' => 'color',
                        'label' => 'Normal',
						'value' => '#f26726',
                        'type' => 'colorpicker'
                    ],
                    [
                        'name' => 'color_hover',
                        'label' => 'Hover',
						'value' => '#6fcf6c',
                        'type' => 'colorpicker'
                    ],
                    [
                        'name' => 'font_size',
                        'label' => 'Font size',
						'value' => '15px',
                        'type' => 'combobox',
                        'options' => [
                            '14px' => '14 px',
                            '15px' => '15 px',
                            '16px' => '16 px',
                        ]
                    ],
                ]
            ],
            [
				'name' => 'button',
				'label' => 'Button',
				'type' => 'fieldset',
				'items' => [
					[
						'name' => 'color',
						'label' => 'Normal',
						'value' => '#27b4f0',
						'type' => 'colorpicker'
					],
					[
						'name' => 'color_hover',
						'label' => 'Text Hover',
						'value' => '#f26726',
						'type' => 'colorpicker'
					],
					[
						'name' => 'font_size',
						'label' => 'Font size',
						'value' => '13px',
						'type' => 'combobox',
						'options' => [
							'13px' => '13 px',
							'14px' => '14 px',
							'15px' => '15 px',
						]
					],
					[
						'name' => 'background_color',
						'label' => 'Background color',
						'value' => '#ea87ed',
						'type' => 'colorpicker'
					],
					[
						'name' => 'background_hover',
						'label' => 'Background Hover',
						'value' => '#f26726',
						'type' => 'colorpicker'
					],
				]
			]
        ]
	]
];