<?php
/**
 * An example file demonstrating how to add all controls.
 *
 * @package     Kirki
 * @category    Core
 * @author      Ari Stathopoulos (@aristath)
 * @copyright   Copyright (c) 2019, Ari Stathopoulos (@aristath)
 * @license     https://opensource.org/licenses/MIT
 * @since       3.0.12
 */

use Kirki\Core\Helper;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not proceed if Kirki does not exist.
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/**
 * First of all, add the config.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/config.html
 */
Kirki::add_config(
	'kirki_demo',
	[
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	]
);

/**
 * Add a panel.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/panels.html
 */
Kirki::add_panel(
	'kirki_demo_panel',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Kirki Demo Panel', 'kirki' ),
		'description' => esc_html__( 'Contains sections for all kirki controls.', 'kirki' ),
	]
);

/**
 * Add Sections.
 *
 * We'll be doing things a bit differently here, just to demonstrate an example.
 * We're going to define 1 section per control-type just to keep things clean and separate.
 *
 * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
 */
$sections = [
	'background'      => [ esc_html__( 'Background', 'kirki' ), '' ],
	'code'            => [ esc_html__( 'Code', 'kirki' ), '' ],
	'checkbox'        => [ esc_html__( 'Checkbox', 'kirki' ), '' ],
	'color'           => [ esc_html__( 'Color', 'kirki' ), '' ],
	'color-palette'   => [ esc_html__( 'Color Palette', 'kirki' ), '' ],
	'custom'          => [ esc_html__( 'Custom', 'kirki' ), '' ],
	'dashicons'       => [ esc_html__( 'Dashicons', 'kirki' ), '' ],
	'date'            => [ esc_html__( 'Date', 'kirki' ), '' ],
	'dimension'       => [ esc_html__( 'Dimension', 'kirki' ), '' ],
	'dimensions'      => [ esc_html__( 'Dimensions', 'kirki' ), '' ],
	'dropdown-pages'  => [ esc_html__( 'Dropdown Pages', 'kirki' ), '' ],
	'editor'          => [ esc_html__( 'Editor', 'kirki' ), '' ],
	'fontawesome'     => [ esc_html__( 'Font-Awesome', 'kirki' ), '' ],
	'generic'         => [ esc_html__( 'Generic', 'kirki' ), '' ],
	'image'           => [ esc_html__( 'Image', 'kirki' ), '' ],
	'multicheck'      => [ esc_html__( 'Multicheck', 'kirki' ), '' ],
	'multicolor'      => [ esc_html__( 'Multicolor', 'kirki' ), '' ],
	'number'          => [ esc_html__( 'Number', 'kirki' ), '' ],
	'palette'         => [ esc_html__( 'Palette', 'kirki' ), '' ],
	'preset'          => [ esc_html__( 'Preset', 'kirki' ), '' ],
	'radio'           => [ esc_html__( 'Radio', 'kirki' ), esc_html__( 'A plain Radio control.', 'kirki' ) ],
	'radio-buttonset' => [ esc_html__( 'Radio Buttonset', 'kirki' ), esc_html__( 'Radio-Buttonset controls are essentially radio controls with some fancy styling to make them look cooler.', 'kirki' ) ],
	'radio-image'     => [ esc_html__( 'Radio Image', 'kirki' ), esc_html__( 'Radio-Image controls are essentially radio controls with some fancy styles to use images', 'kirki' ) ],
	'repeater'        => [ esc_html__( 'Repeater', 'kirki' ), '' ],
	'select'          => [ esc_html__( 'Select', 'kirki' ), '' ],
	'slider'          => [ esc_html__( 'Slider', 'kirki' ), '' ],
	'sortable'        => [ esc_html__( 'Sortable', 'kirki' ), '' ],
	'switch'          => [ esc_html__( 'Switch', 'kirki' ), '' ],
	'toggle'          => [ esc_html__( 'Toggle', 'kirki' ), '' ],
	'typography'      => [ esc_html__( 'Typography', 'kirki' ), '', 'outer' ],
];
foreach ( $sections as $section_id => $section ) {
	$section_args = [
		'title'       => $section[0],
		'description' => $section[1],
		'panel'       => 'kirki_demo_panel',
	];
	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}
	Kirki::add_section( str_replace( '-', '_', $section_id ) . '_section', $section_args );
}

Kirki::add_section(
	'pro_test',
	[
		'title'       => esc_html__( 'Test Link Section', 'kirki' ),
		'type'        => 'link',
		'button_text' => esc_html__( 'Pro', 'kirki' ),
		'button_url'  => 'https://wplemon.com',
	]
);

/**
 * A proxy function. Automatically passes-on the config-id.
 *
 * @param array $args The field arguments.
 */
function my_config_kirki_add_field( $args ) {
	Kirki::add_field( 'kirki_demo', $args );
}

/**
 * Background Control.
 *
 * @todo Triggers change on load.
 */
my_config_kirki_add_field(
	[
		'type'        => 'background',
		'settings'    => 'background_setting',
		'label'       => esc_html__( 'Background Control', 'kirki' ),
		'description' => esc_html__( 'Background conrols are pretty complex! (but useful if properly used)', 'kirki' ),
		'section'     => 'background_section',
		'default'     => [
			'background-color'      => 'rgba(20,20,20,.8)',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
	]
);

/**
 * Code control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/code.html
 */
my_config_kirki_add_field(
	[
		'type'        => 'code',
		'settings'    => 'code_setting',
		'label'       => esc_html__( 'Code Control', 'kirki' ),
		'description' => esc_html__( 'Description', 'kirki' ),
		'section'     => 'code_section',
		'default'     => '',
		'choices'     => [
			'language' => 'css',
		],
	]
);

/**
 * Checkbox control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/checkbox.html
 */
my_config_kirki_add_field(
	[
		'type'        => 'checkbox',
		'settings'    => 'checkbox_setting',
		'label'       => esc_html__( 'Checkbox Control', 'kirki' ),
		'description' => esc_html__( 'Description', 'kirki' ),
		'section'     => 'checkbox_section',
		'default'     => true,
	]
);

/**
 * Color Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color.html
 */
my_config_kirki_add_field(
	[
		'type'        => 'color',
		'settings'    => 'color_setting_hex',
		'label'       => __( 'Color Control (hex-only)', 'kirki' ),
		'description' => esc_html__( 'This is a color control - without alpha channel.', 'kirki' ),
		'section'     => 'color_section',
		'default'     => '#0008DC',
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'color',
		'settings'    => 'color_setting_rgba',
		'label'       => __( 'Color Control (with alpha channel)', 'kirki' ),
		'description' => esc_html__( 'This is a color control - with alpha channel.', 'kirki' ),
		'section'     => 'color_section',
		'default'     => '',
		'choices'     => [
			'alpha' => true,
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'color',
		'settings'    => 'color_setting_hue',
		'label'       => __( 'Color Control - hue only.', 'kirki' ),
		'description' => esc_html__( 'This is a color control - hue only.', 'kirki' ),
		'section'     => 'color_section',
		'default'     => 160,
		'mode'        => 'hue',
	]
);

/**
 * DateTime Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'date',
		'settings'    => 'date_setting',
		'label'       => esc_html__( 'Date Control', 'kirki' ),
		'description' => esc_html__( 'This is a date control.', 'kirki' ),
		'section'     => 'date_section',
		'default'     => '',
	]
);

/**
 * Editor Controls
 */
my_config_kirki_add_field(
	[
		'type'        => 'editor',
		'settings'    => 'editor_1',
		'label'       => esc_html__( 'First Editor Control', 'kirki' ),
		'description' => esc_html__( 'This is an editor control.', 'kirki' ),
		'section'     => 'editor_section',
		'default'     => '',
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'editor',
		'settings'    => 'editor_2',
		'label'       => esc_html__( 'Second Editor Control', 'kirki' ),
		'description' => esc_html__( 'This is a 2nd editor control just to check that we do not have issues with multiple instances.', 'kirki' ),
		'section'     => 'editor_section',
		'default'     => esc_html__( 'Default Text', 'kirki' ),
	]
);

/**
 * Color-Palette Controls.
 *
 * @link https://aristath.github.io/kirki/docs/controls/color-palette.html
 */
my_config_kirki_add_field(
	[
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_0',
		'label'       => esc_html__( 'Color-Palette', 'kirki' ),
		'description' => esc_html__( 'This is a color-palette control', 'kirki' ),
		'section'     => 'color_palette_section',
		'default'     => '#888888',
		'choices'     => [
			'colors' => [ '#000000', '#222222', '#444444', '#666666', '#888888', '#aaaaaa', '#cccccc', '#eeeeee', '#ffffff' ],
			'style'  => 'round',
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_4',
		'label'       => esc_html__( 'Color-Palette', 'kirki' ),
		'description' => esc_html__( 'Material Design Colors - all', 'kirki' ),
		'section'     => 'color_palette_section',
		'default'     => '#F44336',
		'choices'     => [
			'colors' => Helper::get_material_design_colors( 'all' ),
			'size'   => 17,
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_1',
		'label'       => esc_html__( 'Color-Palette', 'kirki' ),
		'description' => esc_html__( 'Material Design Colors - primary', 'kirki' ),
		'section'     => 'color_palette_section',
		'default'     => '#000000',
		'choices'     => [
			'colors' => Helper::get_material_design_colors( 'primary' ),
			'size'   => 25,
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_2',
		'label'       => esc_html__( 'Color-Palette', 'kirki' ),
		'description' => esc_html__( 'Material Design Colors - red', 'kirki' ),
		'section'     => 'color_palette_section',
		'default'     => '#FF1744',
		'choices'     => [
			'colors' => Helper::get_material_design_colors( 'red' ),
			'size'   => 16,
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'color-palette',
		'settings'    => 'color_palette_setting_3',
		'label'       => esc_html__( 'Color-Palette', 'kirki' ),
		'description' => esc_html__( 'Material Design Colors - A100', 'kirki' ),
		'section'     => 'color_palette_section',
		'default'     => '#FF80AB',
		'choices'     => [
			'colors' => Helper::get_material_design_colors( 'A100' ),
			'size'   => 60,
			'style'  => 'round',
		],
	]
);

/**
 * Dashicons control.
 *
 * @link https://aristath.github.io/kirki/docs/controls/dashicons.html
 */
my_config_kirki_add_field(
	[
		'type'        => 'dashicons',
		'settings'    => 'dashicons_setting_0',
		'label'       => esc_html__( 'Dashicons Control', 'kirki' ),
		'description' => esc_html__( 'Using a custom array of dashicons', 'kirki' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
		'choices'     => [
			'menu',
			'admin-site',
			'dashboard',
			'admin-post',
			'admin-media',
			'admin-links',
			'admin-page',
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'dashicons',
		'settings'    => 'dashicons_setting_1',
		'label'       => esc_html__( 'All Dashicons', 'kirki' ),
		'description' => esc_html__( 'Showing all dashicons', 'kirki' ),
		'section'     => 'dashicons_section',
		'default'     => 'menu',
	]
);

/**
 * Dimension Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'dimension',
		'settings'    => 'dimension_0',
		'label'       => esc_html__( 'Dimension Control', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'dimension_section',
		'default'     => '10px',
		'choices'     => [
			'accept_unitless' => true,
		],
	]
);

/**
 * Dimensions Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'dimensions',
		'settings'    => 'dimensions_0',
		'label'       => esc_html__( 'Dimension Control', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'dimensions_section',
		'default'     => [
			'width'  => '100px',
			'height' => '100px',
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'dimensions',
		'settings'    => 'dimensions_1',
		'label'       => esc_html__( 'Dimension Control', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'dimensions_section',
		'default'     => [
			'padding-top'    => '1em',
			'padding-bottom' => '10rem',
			'padding-left'   => '1vh',
			'padding-right'  => '10px',
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'spacing',
		'settings'    => 'spacing_0',
		'label'       => esc_html__( 'Spacing Control', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'dimensions_section',
		'default'     => [
			'top'    => '1em',
			'bottom' => '10rem',
			'left'   => '1vh',
			'right'  => '10px',
		],
	]
);

/**
 * Dropdown-pages Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'dropdown-pages',
		'settings'    => 'dropdown-pages',
		'label'       => esc_html__( 'Dimension Control', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'dropdown_pages_section',
		'default'     => [
			'width'  => '100px',
			'height' => '100px',
		],
	]
);

/**
 * Font-Awesome Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'fontawesome',
		'settings'    => 'fontawesome_setting',
		'label'       => esc_html__( 'Font Awesome Control', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'fontawesome_section',
		'default'     => 'bath',
	]
);

/**
 * Generic Controls.
 */
my_config_kirki_add_field(
	[
		'type'        => 'text',
		'settings'    => 'generic_text_setting',
		'label'       => esc_html__( 'Text Control', 'kirki' ),
		'description' => esc_html__( 'Description', 'kirki' ),
		'section'     => 'generic_section',
		'default'     => '',
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'textarea',
		'settings'    => 'generic_textarea_setting',
		'label'       => esc_html__( 'Textarea Control', 'kirki' ),
		'description' => esc_html__( 'Description', 'kirki' ),
		'section'     => 'generic_section',
		'default'     => '',
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'generic',
		'settings'    => 'generic_custom_setting',
		'label'       => esc_html__( 'Custom input Control.', 'kirki' ),
		'description' => esc_html__( 'The "generic" control allows you to add any input type you want. In this case we use type="password" and define custom styles.', 'kirki' ),
		'section'     => 'generic_section',
		'default'     => '',
		'choices'     => [
			'element'  => 'input',
			'type'     => 'password',
			'style'    => 'background-color:black;color:red;',
			'data-foo' => 'bar',
		],
	]
);

/**
 * Image Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'image',
		'settings'    => 'image_setting_url',
		'label'       => esc_html__( 'Image Control (URL)', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'image_section',
		'default'     => '',
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'image',
		'settings'    => 'image_setting_id',
		'label'       => esc_html__( 'Image Control (ID)', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => [
			'save_as' => 'id',
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'image',
		'settings'    => 'image_setting_array',
		'label'       => esc_html__( 'Image Control (array)', 'kirki' ),
		'description' => esc_html__( 'Description Here.', 'kirki' ),
		'section'     => 'image_section',
		'default'     => '',
		'choices'     => [
			'save_as' => 'array',
		],
	]
);

/**
 * Multicheck Control.
 */
my_config_kirki_add_field(
	[
		'type'     => 'multicheck',
		'settings' => 'multicheck_setting',
		'label'    => esc_html__( 'Multickeck Control', 'kirki' ),
		'section'  => 'multicheck_section',
		'default'  => [ 'option-1', 'option-3', 'option-4' ],
		'priority' => 10,
		'choices'  => [
			'option-1' => esc_html__( 'Option 1', 'kirki' ),
			'option-2' => esc_html__( 'Option 2', 'kirki' ),
			'option-3' => esc_html__( 'Option 3', 'kirki' ),
			'option-4' => esc_html__( 'Option 4', 'kirki' ),
			'option-5' => esc_html__( 'Option 5', 'kirki' ),
		],
	]
);

/**
 * Multicolor Control.
 */
my_config_kirki_add_field(
	[
		'type'     => 'multicolor',
		'settings' => 'multicolor_setting',
		'label'    => esc_html__( 'Label', 'kirki' ),
		'section'  => 'multicolor_section',
		'priority' => 10,
		'choices'  => [
			'link'   => esc_html__( 'Color', 'kirki' ),
			'hover'  => esc_html__( 'Hover', 'kirki' ),
			'active' => esc_html__( 'Active', 'kirki' ),
		],
		'alpha'    => true,
		'default'  => [
			'link'   => '#0088cc',
			'hover'  => '#00aaff',
			'active' => '#00ffff',
		],
	]
);

/**
 * Number Control.
 */
my_config_kirki_add_field(
	[
		'type'     => 'number',
		'settings' => 'number_setting',
		'label'    => esc_html__( 'Label', 'kirki' ),
		'section'  => 'number_section',
		'priority' => 10,
		'choices'  => [
			'min'  => -5,
			'max'  => 5,
			'step' => 1,
		],
	]
);

/**
 * Palette Control.
 */
my_config_kirki_add_field(
	[
		'type'     => 'palette',
		'settings' => 'palette_setting',
		'label'    => esc_html__( 'Label', 'kirki' ),
		'section'  => 'palette_section',
		'default'  => 'blue',
		'choices'  => [
			'a200'  => Helper::get_material_design_colors( 'A200' ),
			'blue'  => Helper::get_material_design_colors( 'blue' ),
			'green' => [ '#E8F5E9', '#C8E6C9', '#A5D6A7', '#81C784', '#66BB6A', '#4CAF50', '#43A047', '#388E3C', '#2E7D32', '#1B5E20', '#B9F6CA', '#69F0AE', '#00E676', '#00C853' ],
			'bnw'   => [ '#000000', '#ffffff' ],
		],
	]
);

/**
 * Radio Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'radio',
		'settings'    => 'radio_setting',
		'label'       => esc_html__( 'Radio Control', 'kirki' ),
		'description' => esc_html__( 'The description here.', 'kirki' ),
		'section'     => 'radio_section',
		'default'     => 'option-3',
		'choices'     => [
			'option-1' => esc_html__( 'Option 1', 'kirki' ),
			'option-2' => esc_html__( 'Option 2', 'kirki' ),
			'option-3' => esc_html__( 'Option 3', 'kirki' ),
			'option-4' => esc_html__( 'Option 4', 'kirki' ),
			'option-5' => esc_html__( 'Option 5', 'kirki' ),
		],
	]
);

/**
 * Radio-Buttonset Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'radio-buttonset',
		'settings'    => 'radio_buttonset_setting',
		'label'       => esc_html__( 'Radio-Buttonset Control', 'kirki' ),
		'description' => esc_html__( 'The description here.', 'kirki' ),
		'section'     => 'radio_buttonset_section',
		'default'     => 'option-2',
		'choices'     => [
			'option-1' => esc_html__( 'Option 1', 'kirki' ),
			'option-2' => esc_html__( 'Option 2', 'kirki' ),
			'option-3' => esc_html__( 'Option 3', 'kirki' ),
		],
	]
);

/**
 * Radio-Image Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'radio-image',
		'settings'    => 'radio_image_setting',
		'label'       => esc_html__( 'Radio-Image Control', 'kirki' ),
		'description' => esc_html__( 'The description here.', 'kirki' ),
		'section'     => 'radio_image_section',
		'default'     => 'travel',
		'choices'     => [
			'moto'    => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-moto.png',
			'cossack' => 'https://raw.githubusercontent.com/templatemonster/cossack-wapuula/master/cossack-wapuula.png',
			'travel'  => 'https://jawordpressorg.github.io/wapuu/wapuu-archive/wapuu-travel.png',
		],
	]
);

/**
 * Repeater Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'repeater',
		'settings'    => 'repeater_setting',
		'label'       => esc_html__( 'Repeater Control', 'kirki' ),
		'description' => esc_html__( 'The description here.', 'kirki' ),
		'section'     => 'repeater_section',
		'default'     => [
			[
				'link_text'   => esc_html__( 'Kirki Site', 'kirki' ),
				'link_url'    => 'https://aristath.github.io/kirki/',
				'link_target' => '_self',
				'checkbox'    => false,
			],
			[
				'link_text'   => esc_html__( 'Kirki Repository', 'kirki' ),
				'link_url'    => 'https://github.com/aristath/kirki',
				'link_target' => '_self',
				'checkbox'    => false,
			],
		],
		'fields'      => [
			'link_text'   => [
				'type'        => 'text',
				'label'       => esc_html__( 'Link Text', 'kirki' ),
				'description' => esc_html__( 'This will be the label for your link', 'kirki' ),
				'default'     => '',
			],
			'link_url'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Link URL', 'kirki' ),
				'description' => esc_html__( 'This will be the link URL', 'kirki' ),
				'default'     => '',
			],
			'link_target' => [
				'type'        => 'select',
				'label'       => esc_html__( 'Link Target', 'kirki' ),
				'description' => esc_html__( 'This will be the link target', 'kirki' ),
				'default'     => '_self',
				'choices'     => [
					'_blank' => esc_html__( 'New Window', 'kirki' ),
					'_self'  => esc_html__( 'Same Frame', 'kirki' ),
				],
			],
			'checkbox'    => [
				'type'    => 'checkbox',
				'label'   => esc_html__( 'Checkbox', 'kirki' ),
				'default' => false,
			],
		],
	]
);

/**
 * Select Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'select',
		'settings'    => 'select_setting',
		'label'       => esc_html__( 'Select Control', 'kirki' ),
		'description' => esc_html__( 'The description here.', 'kirki' ),
		'section'     => 'select_section',
		'default'     => 'option-3',
		'placeholder' => esc_html__( 'Select an option', 'kirki' ),
		'choices'     => [
			'option-1' => esc_html__( 'Option 1', 'kirki' ),
			'option-2' => esc_html__( 'Option 2', 'kirki' ),
			'option-3' => esc_html__( 'Option 3', 'kirki' ),
			'option-4' => esc_html__( 'Option 4', 'kirki' ),
			'option-5' => esc_html__( 'Option 5', 'kirki' ),
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'select',
		'settings'    => 'select_setting_multiple',
		'label'       => esc_html__( 'Select Control', 'kirki' ),
		'description' => esc_html__( 'The description here.', 'kirki' ),
		'section'     => 'select_section',
		'default'     => 'option-3',
		'multiple'    => 3,
		'choices'     => [
			'option-1' => esc_html__( 'Option 1', 'kirki' ),
			'option-2' => esc_html__( 'Option 2', 'kirki' ),
			'option-3' => esc_html__( 'Option 3', 'kirki' ),
			'option-4' => esc_html__( 'Option 4', 'kirki' ),
			'option-5' => esc_html__( 'Option 5', 'kirki' ),
		],
	]
);

/**
 * Slider Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'slider',
		'settings'    => 'slider_setting',
		'label'       => esc_html__( 'Slider Control', 'kirki' ),
		'description' => esc_html__( 'The description here.', 'kirki' ),
		'section'     => 'slider_section',
		'default'     => '10',
		'choices'     => [
			'min'    => 0,
			'max'    => 20,
			'step'   => 1,
			'suffix' => 'px',
		],
	]
);

/**
 * Sortable control.
 */
my_config_kirki_add_field(
	[
		'type'     => 'sortable',
		'settings' => 'sortable_setting',
		'label'    => __( 'This is a sortable control.', 'kirki' ),
		'section'  => 'sortable_section',
		'default'  => [ 'option3', 'option1', 'option4' ],
		'choices'  => [
			'option1' => esc_html__( 'Option 1', 'kirki' ),
			'option2' => esc_html__( 'Option 2', 'kirki' ),
			'option3' => esc_html__( 'Option 3', 'kirki' ),
			'option4' => esc_html__( 'Option 4', 'kirki' ),
			'option5' => esc_html__( 'Option 5', 'kirki' ),
			'option6' => esc_html__( 'Option 6', 'kirki' ),
		],
	]
);

/**
 * Switch control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'switch',
		'settings'    => 'switch_setting',
		'label'       => esc_html__( 'Switch Control', 'kirki' ),
		'description' => esc_html__( 'Description', 'kirki' ),
		'section'     => 'switch_section',
		'default'     => true,
	]
);

my_config_kirki_add_field(
	[
		'type'            => 'switch',
		'settings'        => 'switch_setting_custom_label',
		'label'           => esc_html__( 'Switch Control with custom labels', 'kirki' ),
		'description'     => esc_html__( 'Description', 'kirki' ),
		'section'         => 'switch_section',
		'default'         => true,
		'choices'         => [
			'on'  => esc_html__( 'Enabled', 'kirki' ),
			'off' => esc_html__( 'Disabled', 'kirki' ),
		],
		'active_callback' => [
			[
				'setting'  => 'switch_setting',
				'operator' => '==',
				'value'    => true,
			],
		],
	]
);

/**
 * Toggle control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'toggle',
		'settings'    => 'toggle_setting',
		'label'       => esc_html__( 'Toggle Control', 'kirki' ),
		'description' => esc_html__( 'Description', 'kirki' ),
		'section'     => 'toggle_section',
		'default'     => true,
		// WIP.
		'transport'   => 'postMessage',
		// WIP.
		'js_vars'     => [
			[
				'element'  => '.site-description',
				'function' => 'toggleClass',
				'class'    => 'hidden',
				'value'    => true,
			],
		],
	]
);

/**
 * Typography Control.
 */
my_config_kirki_add_field(
	[
		'type'        => 'typography',
		'settings'    => 'typography_setting_0',
		'label'       => esc_html__( 'Typography Control Label', 'kirki' ),
		'description' => esc_html__( 'The full set of options.', 'kirki' ),
		'section'     => 'typography_section',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family'     => 'Roboto',
			'variant'         => 'regular',
			'font-size'       => '14px',
			'line-height'     => '1.5',
			'letter-spacing'  => '0',
			'color'           => '#333333',
			'text-transform'  => 'none',
			'text-decoration' => 'none',
			'text-align'      => 'left',
			'margin-top'      => '0',
			'margin-bottom'   => '0',
		],
		'output'      => [
			[
				'element' => 'body, p',
			],
		],
		'choices'     => [
			'fonts' => [
				'google'   => [ 'popularity', 60 ],
				'families' => [
					'custom' => [
						'text'     => 'My Custom Fonts (demo only)',
						'children' => [
							[
								'id'   => 'helvetica-neue',
								'text' => 'Helvetica Neue',
							],
							[
								'id'   => 'linotype-authentic',
								'text' => 'Linotype Authentic',
							],
						],
					],
				],
				'variants' => [
					'helvetica-neue'     => [ 'regular', '900' ],
					'linotype-authentic' => [ 'regular', '100', '300' ],
				],
			],
		],
	]
);

my_config_kirki_add_field(
	[
		'type'        => 'typography',
		'settings'    => 'typography_setting_1',
		'label'       => esc_html__( 'Typography Control Label', 'kirki' ),
		'description' => esc_html__( 'The full set of options.', 'kirki' ),
		'section'     => 'typography_section',
		'priority'    => 10,
		'transport'   => 'auto',
		'default'     => [
			'font-family' => 'Roboto',
		],
		'output'      => [
			[
				'element' => [ 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ],
			],
		],
	]
);

/**
 * Example function that creates a control containing the available sidebars as choices.
 *
 * @return void
 */
function kirki_sidebars_select_example() {
	$sidebars = [];
	if ( isset( $GLOBALS['wp_registered_sidebars'] ) ) {
		$sidebars = $GLOBALS['wp_registered_sidebars'];
	}
	$sidebars_choices = [];
	foreach ( $sidebars as $sidebar ) {
		$sidebars_choices[ $sidebar['id'] ] = $sidebar['name'];
	}
	if ( ! class_exists( 'Kirki' ) ) {
		return;
	}
	Kirki::add_field(
		'kirki_demo',
		[
			'type'        => 'select',
			'settings'    => 'sidebars_select',
			'label'       => esc_html__( 'Sidebars Select', 'kirki' ),
			'description' => esc_html__( 'An example of how to implement sidebars selection.', 'kirki' ),
			'section'     => 'select_section',
			'default'     => 'primary',
			'choices'     => $sidebars_choices,
			'priority'    => 30,
		]
	);
}
add_action( 'init', 'kirki_sidebars_select_example', 999 );
