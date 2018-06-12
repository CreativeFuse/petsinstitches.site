
<?php

$fields = get_field( 'cat_menu', 'options');


$output .= '<div class="o-col-md-4">';
	
	$output .= '<div class="o-mega__well">';

		$output .= '<h4 class="e-h4 o-mega__well__title u-color--white">';

			$output .= 'Quick Links';

		$output .= '</h4>';

		$output .= '<ul class="c-menu c-menu--list">';

			$output .= '<li><a class="c-menu__link e-p--large u-color--blue-l" href="/forms/#Cats">Forms</a></li>';
			$output .= '<li><a class="c-menu__link e-p--large u-color--blue-l" href="/faqs/">FAQs</a></li>';
			$output .= '<li><a class="c-menu__link e-p--large u-color--blue-l" href="/stray-cats/">Stray Cats</a></li>';
			$output .= '<li><a class="c-menu__link e-p--large u-color--blue-l" href="/testimonials/cats/">Testimonials</a></li>';
			$output .= '<li><a class="c-menu__link e-p--large u-color--blue-l" href="/getting-started/">Getting Started</a></li>';
			

		$output .= '</ul>';


	$output .= '</div>';

$output .= '</div>';



$output .= '<div class="o-col-md-3">';
	
	$output .= '<div class="o-mega__well o-mega__well--center">';

		$output .= '<h4 class="e-h4 o-mega__well__title u-color--white">';

			$output .= 'Our Services';

		$output .= '</h4>';

		$output .= '<a class="o-mega__well__img" href="/services/cats/">';

			$output .= '<img class="c-photo c-photo--fancy" src="'.$fields['services_img']['url'].'" alt="'.$fields['services_img']['alt'].'">';

		$output .= '</a>';


	$output .= '</div>';

$output .= '</div>';



$output .= '<div class="o-col-md-4">';
	
	$output .= '<div class="o-mega__well o-mega__well--center">';

		$output .= '<h4 class="e-h4 o-mega__well__title u-color--white">';

			$output .= 'Postoperative Care';

		$output .= '</h4>';

		$output .= '<a class="o-mega__well__img" href="/postoperative-care/cats/">';

			$output .= '<img class="c-photo c-photo--fancy" src="'.$fields['postop_img']['url'].'" alt="'.$fields['postop_img']['alt'].'">';

		$output .= '</a>';


	$output .= '</div>';

$output .= '</div>';

return $output;