
<?php

$fields = get_field( 'about_menu', 'options');


$output .= '<div class="o-col-md-4">';

	$output .= '<div class="o-mega__well">';

		$output .= '<h4 class="e-h4 o-mega__well__title u-color--white">';

			$output .= 'Our Clinic';

		$output .= '</h4>';

		$output .= '<ul class="c-menu c-menu--list">';

			$output .= '<li><a class="c-menu__link e-p--large u-color--blue-l" href="/take-a-tour/">Take a Tour</a></li>';
			$output .= '<li><a class="c-menu__link e-p--large u-color--blue-l" href="/faqs/">FAQs</a></li>';
			$output .= '<li><a class="c-menu__link e-p--large u-color--blue-l" href="/testimonials/">Testimonials</a></li>';
			$output .= '<li><a class="c-menu__link e-p--large u-color--blue-l" href="/getting-started/" data-event-origin="about-menu">Getting Started</a></li>';

		$output .= '</ul>';


	$output .= '</div>';

$output .= '</div>';


$output .= '<div class="o-col-md-3">';

	$output .= '<div class="o-mega__well o-mega__well--center">';

		$output .= '<h4 class="e-h4 o-mega__well__title u-color--white">';

			$output .= 'Our Team';

		$output .= '</h4>';

		$output .= '<a class="o-mega__well__img" href="/about/">';

			$output .= '<img class="c-photo c-photo--fancy" src="'.$fields['team_img']['url'].'" alt="'.$fields['team_img']['alt'].'">';

		$output .= '</a>';

	$output .= '</div>';

$output .= '</div>';



$output .= '<div class="o-col-md-4">';

	$output .= '<div class="o-mega__well o-mega__well--center">';

		$output .= '<h4 class="e-h4 o-mega__well__title u-color--white">';

			$output .= 'Our Partners';

		$output .= '</h4>';

		$output .= '<a class="o-mega__well__img" href="/partners/">';

			$output .= '<img class="c-photo c-photo--fancy" src="'.$fields['partners_img']['url'].'" alt="'.$fields['partners_img']['alt'].'">';

		$output .= '</a>';


	$output .= '</div>';

$output .= '</div>';

return $output;