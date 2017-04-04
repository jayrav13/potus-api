#!/usr/bin/python
# -*- coding: utf-8 -*-

# Imports
from lxml import html
import requests
import json

# Set URL for a list of all presidents.
base_url = "https://en.wikipedia.org"
presidents_url = base_url + "/wiki/List_of_Vice_Presidents_of_the_United_States"

# Get HTML Page and build a tree.
response = requests.get(presidents_url)
tree = html.document_fromstring(response.text)

# Get the table of all US presidents.
table = tree.xpath('//table[@class="wikitable"]')[0]

# Set an output array for all presidents.
output = []

# Build a 2D array for all data elements in rows.
rows = [ [y for y in x.xpath('td')] for x in table.xpath('tr') ]

# Determine what the longest row length is.
max_len = max([len(x) for x in rows])

def is_int(num):
	"""
	is_int

	Confirms if an input is numeric.
	"""

	try:
		x = int(num)
		return True
	except:
		return False

current_president = None

# Iterate through rows and append data to output array.
for row in rows:

	if len(row) > 0 and is_int(row[0].text_content()):
		data = {
			"number": int(row[0].text_content()),
			"image": "https" + row[2].xpath('a')[0].xpath('img')[0].attrib['src'],
			"name": row[3].text_content().split("\n")[0],
			"party_affiliation": row[6].xpath('a')[0].text_content().replace("\n", "") if len(row[6].xpath('a')) > 0 else None,
			"previous_office": row[4].text_content().split("(")[0].replace("\n", " ").strip(),
			"start_date": row[1].text_content().split(u"–")[0].replace("\n", "").split("[")[0].split("(")[0],
			"end_date": row[1].text_content().split(u"–")[1].replace("\n", "").split("[")[0].split("(")[0] if row[1].text_content().split(u"–")[1].replace("\n", "").split("[")[0].split("(")[0] != "Incumbent" else None,
		}
		output.append(data)

print json.dumps(output, indent=4, sort_keys=True)