<?php

/**
 * @file tests/data/60-content/MallySubmissionTest.php
 *
 * Copyright (c) 2014 Simon Fraser University Library
 * Copyright (c) 2000-2014 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class MallySubmissionTest
 * @ingroup tests_data
 *
 * @brief Data build suite: Create submission
 */

import('tests.data.ContentBaseTestCase');

class MallySubmissionTest extends ContentBaseTestCase {
	/**
	 * Create a submission.
	 */
	function testSubmission() {
		$this->register(array(
			'username' => 'mally',
			'firstName' => 'Mohamed',
			'lastName' => 'Ally',
			// 'affiliation' => '',
			'country' => 'Canada',
			'roles' => array('Volume editor'),
		));

		$title = 'Mobile Learning: Transforming the Delivery of Education and Training';
		$this->createSubmission(array(
			'type' => 'editedVolume',
			'title' => $title,
			'abstract' => 'This collection is for anyone interested in the use of mobile technology for various distance learning applications. Readers will discover how to design learning materials for delivery on mobile technology and become familiar with the best practices of other educators, trainers, and researchers in the field, as well as the most recent initiatives in mobile learning research. Businesses and governments can learn how to deliver timely information to staff using mobile devices. Professors can use this book as a textbook for courses on distance education, mobile learning, and educational technology.',
			'keywords' => array(
				'Educational Technology',
			),
			'additionalAuthors' => array(
				array(
					'firstName' => 'John',
					'lastName' => 'Traxler',
					'country' => 'United Kingdom',
					// 'affiliation' => '',
					'email' => 'jtraxler@mailinator.com',
				),
				array(
					'firstName' => 'Marguerite',
					'lastName' => 'Koole',
					'country' => 'Canada',
					// 'affiliation' => '',
					'email' => 'mkoole@mailinator.com',
				),
				array(
					'firstName' => 'Torstein',
					'lastName' => 'Rekkedal',
					'country' => 'Norway',
					// 'affiliation' => '',
					'email' => 'trekkedal@mailinator.com',
				),
			),
			'chapters' => array(
				array(
					'title' => 'Current State of Mobile Learning',
					'contributors' => array('John Traxler'),
				),
			),
			'chapters' => array(
				array(
					'title' => 'A Model for Framing Mobile Learning',
					'contributors' => array('Marguerite Koole'),
				),
			),
			'chapters' => array(
				array(
					'title' => 'Mobile Distance Learning with PDAs: Development and Testing of Pedagogical and System Solutions Supporting Mobile Distance Learners',
					'contributors' => array('Torstein Rekkedal'),
				),
			),
		));
		$this->logOut();

		$this->findSubmissionAsEditor('dbarnes', null, $title);
                $this->sendToReview('Internal');

		// FIXME: reviewers need to be assigned, decision recorded

		$this->logOut();
	}
}