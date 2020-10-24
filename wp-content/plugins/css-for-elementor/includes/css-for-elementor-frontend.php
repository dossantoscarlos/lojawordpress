<?php

//define( 'CSS_FOR_ELEMENTOR_PATH_DIR', plugin_dir_path( __FILE__ ) );



if(get_option( 'front_on' ) == 'front-on' ){


/**
 * CSS For Elementor Map widget
 */
	add_action( 'elementor/element/after_section_end', function( $element, $section_id, $args ) {
		/** @var \Elementor\Element_Base $element */
		if ( 'google_maps' === $element->get_name() && 'section_map_style' === $section_id ) {
	
			$element->start_controls_section(
				'css_for_elementor',
				[
					'label' => __( '<i class="dashicons dashicons-align-right" style="vertical-align: middle; color:#d30c5c"></i> Map Backgound Color', 'css-for-elementor' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
	
	
			$element->add_control(
				'recommanded_color',
				[
					'label' => __('use color: #f6f6f6 | #E9E9E9 | #ffffff'),
					'type'  => \Elementor\Controls_Manager::RAW_HTML,
					
				]
			);
	
			$element->add_control(
				'map_bg_color',
				[
					'label' => __( 'Map BG Color', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}}::before' => 
						'content: " ";
						 position: absolute !important;
						 background-color: {{VALUE}} !important;
						 pointer-events: none;
						 width: 100%;
						 height: 100%;
						 mix-blend-mode: difference;'
					],
				]
			);
	
			
	
			$element->end_controls_section();
	
		
		}
	
	}, 10, 3 );
	
	
	/**
	 * CSS For Elementor Header widget
	 */
	add_action( 'elementor/element/after_section_end', function( $element, $section_id, $args ) {
		/** @var \Elementor\Element_Base $element */
		if ( 'nav-menu' === $element->get_name() && 'section_layout' === $section_id ) {
	
			$element->start_controls_section(
				'section_style_css_for_elementor',
				[
					'label' => __( '<i class="dashicons dashicons-align-right" style="vertical-align: middle; color:#d30c5c"></i> Sticky Header', 'elementor' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
	
	
			$element->add_control(
				'Sticky_bg_color',
				[
					'label' => __( 'Background Color', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'.front-active' => 
						 'background: {{VALUE}} !important;',
					],
				]
			);
			
			$element->add_control(
				'Sticky_font_color',
				[
					'label' => __( 'Color', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'selectors' => [
						'.front-active ul li a' => 
						 'color: {{VALUE}} !important;',
					],
				]
			);
	
			$element->add_control(
				'Sticky_header_height',
				[
					'label' => __( 'Header Height', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 50,
						],
					],
					'selectors' => [
						'.front-active ' => 
						 'height: {{SIZE}}{{UNIT}} !important;',
						 
						//'{{WRAPPER}} .elementor-tabs-content-wrapper' => 'background-color: {{VALUE}};',
					],
				]
			);

			$element->add_control(
				'sticky_header_font_size',
				[
					'label' => __( 'Font Size', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'range' => [
						'px' => [
							'min' => 0,
						],
					],
					'selectors' => [
						'.front-active ul li a' => 'padding: {{SIZE}}{{UNIT}} !important;',
					],
				]
			);

			$element->add_control(
				'sticky_header_padding',
				[
					'label' => __( 'Padding', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'.front-active ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$element->add_control(
				'sticky_header_margin',
				[
					'label' => __( 'Margin', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'.front-active ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
	
			$element->end_controls_section();
			
		}
	
	
	}, 10, 3 );
	
	/**
	 * CSS For Elementor Sticky Section
	 */
	add_action( 'elementor/element/after_section_end', function( $element, $section_id, $args ) {
		/** @var \Elementor\Element_Base $element */
		if ( 'heading' === $element->get_name() && 'section_title' === $section_id ) {
	
			$element->start_controls_section(
				'section_style_sticky',
				[
					'label' => __( '<i class="dashicons dashicons-align-right" style="vertical-align: middle; color:#d30c5c"></i> Sticky Section', 'elementor' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				]
			);
	
	
			$element->add_control(
				'Sticky_on',
				[
					'label' => __( 'Sticky On', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'None',
					'options' => [
						'none' => __( 'None', 'css-for-elementor' ),
						'sticky'  => __( 'Sticky', 'css-for-elementor' ),
					],
					'selectors' => [
						'{{WRAPPER}}' => 
						 'position: {{VALUE}} !important;',
					],
				]
			);
			
			$element->add_control(
				'Sticky_top',
				[
					'label' => __( 'Position Top', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 1000,
							'step' => 5,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}}' => 'top: {{SIZE}}{{UNIT}};',
					],
				]
			);
	
			$element->add_control(
				'sticky_padding',
				[
					'label' => __( 'Stikey Padding', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
	
	
			$element->end_controls_section();
			
		}
	
	
	}, 10, 3 );
	
	
	
	
	/**
	 * CSS For Elementor Image in text deisgn
	 */
	add_action('elementor/element/section/section_layout/after_section_end',  'image_text_design', 10);
	
	function image_text_design($element)
	{
		$element->start_controls_section(
			'mix_blend_mode_section',
			[
				'label' => __('<i class="dashicons dashicons-align-right" style="vertical-align: middle; color:#d30c5c"></i>Image text design', 'css-for-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
	
		$element->add_control(
			'mix_blend_mode',
			[
				'label' => __( 'Mix Blend Mode', 'css-for-elementor' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'None',
				'options' => [
					'none' => __( 'None', 'css-for-elementor' ),
					'darken'  => __( 'Darken', 'css-for-elementor' ),
					'color-dodge' => __( 'Color Dodge', 'css-for-elementor' ),
					'multiply' => __( 'Multiply', 'css-for-elementor' ),
					'difference' => __( 'Difference', 'css-for-elementor' ),
					'screen' => __( 'Screen', 'css-for-elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-element-populated' => 
					 'mix-blend-mode: {{VALUE}} !important;',
				],
			]
		);
	
		$element->add_control(
			'cssfe_select_color',
			[
				'label' => __( 'Select Color', 'css-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 
					 'background: {{VALUE}} !important;',
				],
			]
		);
	
		$element->end_controls_section();
	}
	
	
	/**
	 * CSS For Elementor form
	 */
	
	add_action('elementor/element/form/section_form_fields/after_section_end', 'cssfe_form', 10, 2);
	
	function cssfe_form($element) {
	
		$element->start_controls_section(
	
			'cssfe_label',
			[
				'label' => __('<i class="dashicons dashicons-align-right" style="vertical-align: middle; color:#d30c5c"></i>Label & Placeholder', 'css-for-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
	
		$element->add_control(
			'form_label_center',
			[
				'label' => __('Form Label Center', 'css-for-elementor'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'None',
				'options' => [
					'none' => __( 'None', 'css-for-elementor' ),
					'auto'  => __( 'Center', 'css-for-elementor' ),
					
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-field-label' => 
					 'margin: {{VALUE}} !important;',
				],
			]
		);
	
		$element->add_control(
			'cssfe_form_placehoder',
			[
				'label' => __('Placeholder Align', 'css-for-elementor'),
				'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left' => [
							'title' => __( 'Left', 'plugin-domain' ),
							'icon' => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'plugin-domain' ),
							'icon' => 'fa fa-align-center',
						],
						'right' => [
							'title' => __( 'Right', 'plugin-domain' ),
							'icon' => 'fa fa-align-right',
						],
					],
					'default' => 'left',
					'toggle' => true,
				
				'selectors' => [
					'{{WRAPPER}} .elementor-field' => 
					 'text-align: {{VALUE}} !important;',
				],
			]
		);
	
		$element->end_controls_section();
	}
}