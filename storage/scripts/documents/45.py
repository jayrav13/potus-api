#!/usr/bin/python -tt
# -*- coding: utf-8 -*-

"""
Imports
"""
from lxml import html
import requests
import json
import datetime
import os
import time
import sys

"""
Set UTF-8 for everything.
"""
reload(sys)
sys.setdefaultencoding("utf-8")

# Establish Base URL.
base_url = 'https://www.whitehouse.gov'

# Establish all pages to scrape.
pages = {
	"/briefing-room/speeches-and-remarks": "Speeches and Remarks",
	"/briefing-room/press-briefings": "Press Briefings",
	"/briefing-room/statements-and-releases": "Statements and Releases",
	"/briefing-room/presidential-actions/executive-orders": "Executive Orders",
	"/briefing-room/presidential-actions/presidential-memoranda": "Presidential Memoranda",
	"/briefing-room/presidential-actions/proclamations": "Proclamations",
	"/briefing-room/presidential-actions/related-omb-material": "Related OMB Material",
	"/briefing-room/pending-legislation": "Pending Legislation",
	"/briefing-room/signed-legislation": "Signed Legislation",
	"/briefing-room/vetoed-legislation": "Vetoed Legislation",
	"/briefing-room/statements-administration-policy": "Statements of Administration Policy"
}

# Scrape each page.
for key, value in pages.iteritems():

	# Make request and transform into tree.
	page_url = base_url + key
	response = requests.get(page_url)
	tree = html.document_fromstring(response.text)

	# Deterimine number of total pages.
	pagecount = int(tree.xpath('//li[@class="pager-current"]')[0].text_content().split(' of ')[1]) if len(tree.xpath('//li[@class="pager-current"]')) > 0 else 1

	# Keep iterating through pages until you reach a page that has been fully scraped. Then stop.
	for i in range(0, pagecount):

		# Use ?page= parameter to scrape, starting with page 0.
		response = requests.get(page_url)
		tree = html.document_fromstring(response.text)

		# Build the resulting dictionary objects for each document on that page.
		objects = [{
			"document_date": x.xpath('div[contains(@class, "views-field-created")]')[0].text_content().strip(" ") if len(x.xpath('div[contains(@class, "views-field-created")]')) > 0 else x.xpath('div')[0].text_content().split(' on ')[1],
			"title": x.xpath('div[contains(@class, "views-field-title")]')[0].text_content().strip(),
			"category_slug": key,
			"category_name": value,
			"url": base_url + x.xpath('div[contains(@class, "views-field-title")]')[0].xpath('h3')[0].xpath('a')[0].attrib['href'].strip()
		} for x in tree.xpath('//div[contains(@class, "views-row")]')]

		for element in objects:
			try:
				response = requests.get(element['url'])
				ctree = html.document_fromstring(response.text)
				content = ctree.xpath('//div[@id="content-start"]')[0].xpath('div')[-1]
				element['content'] = tree.xpath('//div[@id="content-start"]')[0].xpath('div')[-1].text_content().decode('utf-8').replace("\n", " ").replace("\t", "").replace(u"\u00a0", "").strip() # [x.strip().replace("  ", " ") for x in tree.xpath('//div[@id="content-start"]')[0].xpath('div')[-1].text_content().decode('utf-8').replace("\n", " ").replace("\t", "").replace(u"\u00a0", "").strip().split("    ") if len(x) > 0] if len(tree.xpath('//div[@id="content-start"]')) > 0 else None
			except Exception as e:
				element['content'] = None

			print json.dumps(element)

		pager = tree.xpath('//li[contains(@class, "pager-next")]')
		try:
			page_url = base_url + pager[0].xpath('a')[0].attrib['href']
		except:
			pass


