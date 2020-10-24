<?php

    /**
	 * CSS For Elementor Archive products
	 */

    use Elementor\Scheme_Typography;

    add_action( 'elementor/element/wc-archive-products/section_advanced/after_section_end', function( $element, $args ) {
		$element->start_controls_section(
			'cssfe_archive_pro',
			[
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'label' => __( '<i class="dashicons dashicons-align-right" style="vertical-align: middle; color:#d30c5c"></i> Hide title price button', 'css-for-elementor' ),
			]
		);
		$element->add_control(
			'cssfe_hide_title',
				[
					'label' => __( 'Hide Title', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'your-plugin' ),
					'label_off' => __( 'Hide', 'your-plugin' ),
					'return_value' => 'none',
					'default' => 'block',
					'selectors' => [
						'{{WRAPPER}} .woocommerce-loop-product__title' => 'display: {{VALUE}}',
					],
				]
		);
		$element->add_control(
			'cssfe_hide_price',
				[
					'label' => __( 'Hide Price', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'your-plugin' ),
					'label_off' => __( 'Hide', 'your-plugin' ),
					'return_value' => 'none',
					'default' => 'block',
					'selectors' => [
						'{{WRAPPER}} .price' => 'display: {{VALUE}}',
					],
				]
		);
		$element->add_control(
			'cssfe_hide_button',
				[
					'label' => __( 'Hide button', 'css-for-elementor' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'your-plugin' ),
					'label_off' => __( 'Hide', 'your-plugin' ),
					'return_value' => 'none',
					'default' => 'block',
					'selectors' => [
						'{{WRAPPER}} .add_to_cart_button' => 'display: {{VALUE}}',
					],
				]
		);
	$element->end_controls_section();
	
	/**
	 * Product Pagination section
	 */
	$element->start_controls_section(
		'cssfe_archive_pro_pagi',
		[
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			'label' => __( '<i class="dashicons dashicons-align-right" style="vertical-align: middle; color:#d30c5c"></i> Product Pagination Align', 'css-for-elementor' ),
		]
	);
	$element->add_control(
		'cssfe_pro_pagi_text_align',
		[
			'label' => __( 'Alignment', 'css-for-elementor' ),
			'type' => \Elementor\Controls_Manager::CHOOSE,
			'options' => [
				'left' => [
					'title' => __( 'Left', 'css-for-elementor' ),
					'icon' => 'fa fa-align-left',
				],
				'center' => [
					'title' => __( 'Center', 'css-for-elementor' ),
					'icon' => 'fa fa-align-center',
				],
				'right' => [
					'title' => __( 'Right', 'css-for-elementor' ),
					'icon' => 'fa fa-align-right',
				],
			],
			'default' => 'left',
			'toggle' => true,
			'selectors' => [
				'{{WRAPPER}} .woocommerce nav.woocommerce-pagination' => 'text-align: {{VALUE}} !important',
			],
		]
	);
	
$element->end_controls_section();

	/**
	 * Product Price Currency Symbol style
	 */
	$element->start_controls_section(
		'cssfe_archive_pro_currency',
		[
			'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			'label' => __( '<i class="dashicons dashicons-align-right" style="vertical-align: middle; color:#d30c5c"></i> Price currency style', 'css-for-elementor' ),
		]
	);

	$element->add_control(
		'cssfe_pro_currency_color',
		[
			'label' => __( 'Currency Color', 'plugin-domain' ),
			'type' => \Elementor\Controls_Manager::COLOR,
			'scheme' => [
				'type' => \Elementor\Scheme_Color::get_type(),
				'value' => \Elementor\Scheme_Color::COLOR_1,
			],
			'selectors' => [
				'{{WRAPPER}} span.woocommerce-Price-currencySymbol' => 'color: {{VALUE}}',
			],
		]
	);

	$element->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
		[
			'name' => 'content_typography',
			'label' => __( 'Typography', 'plugin-domain' ),
			'scheme' => Scheme_Typography::TYPOGRAPHY_1,
			'selector' => '{{WRAPPER}} span.woocommerce-Price-currencySymbol',
		]
	);

	
	
$element->end_controls_section();
    
}, 10, 2 );



    
