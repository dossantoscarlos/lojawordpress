<?php

    /**
	 * CSS For Elementor form Acceptence field
	 */
    use Elementor\Scheme_Typography;
	
	add_action('elementor/element/form/section_messages_style/after_section_end', 'cssfe_form_accept', 10, 2);
	
	function cssfe_form_accept($element, $args) {
	
		$element->start_controls_section(
	
			'cssfe_label',
			[
				'label' => __('<i class="dashicons dashicons-align-right" style="vertical-align: middle; color:#d30c5c"></i>Acceptance Field', 'css-for-elementor'),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
	
		$element->add_control(
			'cssfe_form_accept_color',
			[
				'label' => __('Color', 'css-for-elementor'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-field-type-acceptance label' => 'color: {{VALUE}}',
				],
			]
		);
    
        $element->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .elementor-field-type-acceptance label',
			]
		);
		
	
		$element->end_controls_section();
	}