#!/usr/bin/python
# -*- coding: utf-8 -*-

# Imports
from lxml import html
import requests
import json
import sys

response = requests.get('http://www.gallup.com/poll/201617/gallup-daily-trump-job-approval.aspx')
tree = html.document_fromstring(response.text)

table = tree.xpath('//div[@id="rbnData"]/div/table')[0].xpath('tbody')[0].xpath('tr')

output = {}

for row in table:
	data = [x for x in row.xpath('td')]
	output[data[0].text_content().lower().replace(" ", "_")] = {
		"name": data[0].text_content(),
		"value": float(data[1].text_content().replace("%", "").replace("$", "")),
		"change": float(data[2].text_content()) if data[2].text_content() != "-" else 0
		}

print json.dumps(output)
