#!/usr/bin/python
# -*- coding: utf-8 -*-

# Imports
from lxml import html
import requests
import json
import sys

def error_message(message):
	"""
	Returns JSON message as a string to be printed to console.
	"""
	return json.dumps({"error": message}, indent=4, sort_keys=True)

base_wikipedia_url = "https://en.wikipedia.org"

# Throw an error for command-line arguments.
if len(sys.argv) != 3:
	print error_message("Requires 2 command-line arguments: url and number.")
	sys.exit()

# Extract command-line arguments.
url = sys.argv[1]
number = int(sys.argv[2])

# Make request and extract table.
response = requests.get(url)
tree = html.document_fromstring(response.text)
table = tree.xpath('//table[@class="infobox"]')

# Throw an error if table is not found.
if len(table) == 0:
	print error_message("No cabinet tables found for this presidency.")
	sys.exit()

# Retrieve appropriate table.
# For all presidents, this will be the first table except for Grover Cleveland.
# Because he had two non-consecutive terms, we must check which term we're referring to.
# His second term is on a second table.
#
# TODO: Make this more generic such that non-consecutive terms can be handled generically.
else:
	table = table[ 1 if number == 24 else 0 ]

# Iterate through all of the rows of the table.
title = None
output = []

# Store current department.
current_department = None

for row in table.xpath('tr'):

	# Try to extract the title.
	if title == None or len(title) == 0:
		title = row.text_content().strip().split('[')[0]
		continue

	data = row.getchildren()
	if len(data) >= 2:

		if len(data) == 3:
			current_department = data[0]
			data = data[1:]
		# print current_department.text_content()

		element = {
			"department_name": current_department.text_content().replace("\n", " "),
			"permalink": current_department.text_content().replace("\n", " ").lower().replace(" ", "-"),
			"department_url": current_department.xpath('a')[0].attrib['href'] if len(current_department.xpath('a')) > 0 else None,
			"url": base_wikipedia_url + data[0].xpath('a')[0].attrib['href'] if len(data[0].xpath('a')) > 0 else None,
			"name": data[0].text_content().replace("\n", " ").replace("*", ""),
			"years": data[1].text_content().replace(u'\u2013', '-'),
			"start_date": None,
			"end_date": None
		}
		output.append(element)

		if element['url'] is not None:
			response = requests.get(element['url'])
			details = html.document_fromstring(response.text)
			try:
				dates = details.xpath('//table[contains(@class, "vcard")]')[0].xpath('tr/th/a[@href="' + element['department_url'] + '"]')[0].getparent().getparent().getnext().text_content().strip().split("\n")
				dates = [x.strip() for x in dates[1].encode('utf-8').split("–")]
				element['start_date'] = dates[0].decode('utf-8').replace(u"\u00a0", "").split("[")[0]
				element['end_date'] = dates[1].replace(u"\u00a0", "").split("[")[0]
				# print dates
			except Exception as e:
				# print "Fail"
				pass

print json.dumps(output[1:len(output)])
	# print row.text_content().encode('utf-8')

