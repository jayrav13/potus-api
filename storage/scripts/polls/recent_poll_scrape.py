#!/usr/bin/python
# -*- coding: utf-8 -*-

# Imports
from lxml import html
import requests
import json
import sys

# Parse Date Range
def _parse_date_range(date_string):

	# Separate date from year.
	date, year = [x.strip() for x in date_string.split(",")]

	# Split date by space. Result should be either size 2 or size 5.
	date = date.split(" ")

	# If the date range is of length two, this is in the same month.
	if len(date) == 2:
		days = date[1].split("-")
		return [date[0] + " " + days[0] + ", " + year, date[0] + " " + days[1] + ", " + year]
	# If the date range is of length five, this is in different months.
	elif len(date) == 5:
		return [date[0] + " " + date[1] + ", " + year, date[3] + " " + date[4] + ", " + year]
	else:
		return [None, None]

# Return current POTUS Approval Ratings.
response = requests.get("https://en.wikipedia.org/wiki/United_States_presidential_approval_rating")
tree = html.document_fromstring(response.text)
polls = tree.xpath('//table[@class="wikitable"]')[0]

# Set up simple variables for iterating and storing data.
output = []
count = 0

# Iterate through rows.
for poll in polls.xpath('tr'):

	# Ignore header row.
	if count == 0:
		count += 1
		continue		

	# Extract data elements.
	data = poll.xpath('td')

	dates = _parse_date_range(data[1].text_content().encode('utf-8').replace("–", "-"))

	# Build element dictionary.
	element = {
		"polling_group": data[0].text_content().split("[")[0],
		"start_date": dates[0],
		"end_date": dates[1],
		"approval": int(data[2].text_content().strip("%")),
		"disapproval": int(data[3].text_content().strip("%")),
		"unsure": int(data[4].text_content().strip("%")),
		"net": int(data[5].text_content().strip("%")),
		"sample_size": int(data[6].text_content().encode('utf-8').replace("≈", "").replace(",", "")),
		"population": data[7].text_content().split("[")[0] or None
	}

	output.append(element)

print json.dumps(output, indent=4, sort_keys=True)




