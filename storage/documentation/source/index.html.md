---
title: POTUS API

language_tabs:
  - shell

toc_footers:
  - <a href='https://github.com/tripit/slate'>Documentation Powered by Slate</a>
  - <a href='/home'>Return to API Portal</a>

search: true
---

# Introduction

Welcome to the POTUS API! This is a project that comes from an interest in a data source for all things POTUS and Executive Branch. It employs a series of web scrapers to organize and deliver clean data for a variety of related topics.

# Authentication

Authentication is done by registering a user with this API and using an API key for all requests.

## Register User

To create a user, visit the [API Portal](/home) and register.

Once registered, you will have access to your `API Key`. This key should be used for all API requests using the following HTTP Header:

`Authorization: Bearer ...`

Where `...` represents the `API Key`.

<aside class="warning">
The documentation moving forward will <code>NOT</code> include this denoted header in examples, but this token will be required.
</aside>

## Get User

> Get the User object:

```shell
$ curl -i -X GET https://potus-api.herokuapp.com/api/users -H "Authorization: Bearer ..."
```

Once you have an api_token, you can use it to return the User object.

This is a great way to confirm that everything in the Register phase was successful.

# Leadership

## Presidents

> Return all US presidents:

```shell
$ curl -i -X GET http://potus-api.herokuapp.com/api/presidents
```

> Sample JSON response:

```json
[
  {
    "id": 1,
    "name": "George Washington",
    "image": "https//upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Gilbert_Stuart_Williamstown_Portrait_of_George_Washington.jpg/165px-Gilbert_Stuart_Williamstown_Portrait_of_George_Washington.jpg",
    "number": 1,
    "previous_office": "Commander-in-Chief of the Continental Army",
    "presidency_url": "https://en.wikipedia.org/wiki/Presidency_of_George_Washington",
    "party_affiliation": null,
    "start_date": "1789-04-30 00:00:00",
    "end_date": "1797-03-04 00:00:00",
    "created_at": "2017-03-25 01:57:57",
    "updated_at": "2017-03-25 01:57:57",
    "vice_presidents": [
      {
        "id": 1,
        "name": "John Adams",
        "image": "https//upload.wikimedia.org/wikipedia/commons/thumb/d/df/Official_Presidential_portrait_of_John_Adams_%28by_John_Trumbull%2C_circa_1792%29.jpg/140px-Official_Presidential_portrait_of_John_Adams_%28by_John_Trumbull%2C_circa_1792%29.jpg",
        "number": 1,
        "previous_office": "United States Minister to the Court of St. James's",
        "party_affiliation": null,
        "start_date": "1789-04-21 00:00:00",
        "end_date": "1797-03-04 00:00:00",
        "created_at": "2017-03-25 01:57:58",
        "updated_at": "2017-03-25 01:57:58"
      },
      ...
    ]
  },
  ...
]
```

Let's take a look at endpoints for querying POTUS:

### `GET /api/presidents`

This endpoint's primary use case is to return ALL US presidents as an array. It also accepts the following query string parameters to refine your query:

Parameter | Required | Description
--------- | ------- | -----------
`q` | false | Query the name of a US president.<br /><br />This searches a president's name given a search query `q`.

The response from this endpoint will always be an array.

### `GET /api/presidents/{number}`

This endpoint returns a POTUS given his or her number in succession. For example:

- `GET /api/presidents/1` returns <strong>George Washington</strong>.
- `GET /api/presidents/16` returns <strong>Abraham Lincoln</strong>.

The response from this endpoint will always be a single object.

## Vice Presidents

> Return the 1st US vice president:

```shell
$ curl -i -X GET https://potus-api.herokuapp.com/api/vice_presidents/1
```

> Sample JSON response:

```json
{
  "id": 2,
  "name": "Thomas Jefferson",
  "image": "https//upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Thomas_Jefferson_by_Rembrandt_Peale%2C_1800.jpg/140px-Thomas_Jefferson_by_Rembrandt_Peale%2C_1800.jpg",
  "number": 2,
  "previous_office": "1st United States Secretary of State",
  "party_affiliation": "Democratic-Republican",
  "start_date": "1797-03-04 00:00:00",
  "end_date": "1801-03-04 00:00:00",
  "created_at": "2017-03-25 01:57:58",
  "updated_at": "2017-03-25 01:57:58",
  "presidents": [
    {
      "id": 2,
      "name": "John Adams",
      "image": "https//upload.wikimedia.org/wikipedia/commons/thumb/d/df/Official_Presidential_portrait_of_John_Adams_%28by_John_Trumbull%2C_circa_1792%29.jpg/165px-Official_Presidential_portrait_of_John_Adams_%28by_John_Trumbull%2C_circa_1792%29.jpg",
      "number": 2,
      "previous_office": "1st Vice President of the United States",
      "presidency_url": "https://en.wikipedia.org/wiki/Presidency_of_John_Adams",
      "party_affiliation": "Federalist",
      "start_date": "1797-03-04 00:00:00",
      "end_date": "1801-03-04 00:00:00",
      "created_at": "2017-03-25 01:57:57",
      "updated_at": "2017-03-25 01:57:57"
    }
  ]
}
```

Let's take a look at endpoints for querying VPOTUS:

### `GET /api/vice_presidents`

This endpoint's primary use case is to return ALL US vice presidents as an array. It also accepts the following query string parameters to refine your query:

Parameter | Required | Description
--------- | ------- | -----------
`q` | false | Query the name of a US vice president.<br /><br />This searches a vice president's name given a search query `q`.

The response from this endpoint will always be an array.

### `GET /api/vice_presidents/{number}`

This endpoint returns a VPOTUS given his or her number in succession. For example:

- `GET /api/vice_presidents/1` returns <strong>John Adams</strong>.
- `GET /api/vice_presidents/16` returns <strong>Andrew Johnson</strong>.

The response from this endpoint will always be a single object.

## Cabinet Members

> Return the Cabinet Members of the 16th president:

```shell
$ curl -i -X GET https://potus-api.herokuapp.com/api/presidents/16/cabinet
```

> Sample JSON Response:

```json
[
  {...},
  {
    "id": 177,
    "name": "Simon Cameron",
    "department_name": "Secretary of War",
    "department_url": "/wiki/United_States_Secretary_of_War",
    "permalink": "secretary-of-war",
    "url": "https://en.wikipedia.org/wiki/Simon_Cameron",
    "years": "1861-1862",
    "start_date": "1861-03-05 00:00:00",
    "end_date": "1862-01-14 00:00:00",
    "president_id": 16,
    "created_at": "2017-03-26 07:37:17",
    "updated_at": "2017-03-26 07:37:17"
  },
  {...}
]
```

Next, let's take a look at Cabinet Members. A president's cabinet can be queried by the following endpoint:

### `GET /api/presidents/{number}/cabinet`

The response from this endpoint will always be an array.

# Polls

> Retrieve all polls, stored and live:

```shell
$ curl -i -X GET https://potus-api.herokuapp.com/api/polls?live=true
```

> Sample JSON response:

```json
{
  "live": {
    "gallup": {
      "real_unemployment": {
        "change": -0.2,
        "name": "Real Unemployment",
        "value": 9.2
      },
      ...
    }
  },
  "recent": [
    {
      "id": 1,
      "polling_group": "Gallup Poll",
      "approval": 36,
      "disapproval": 57,
      "unsure": 7,
      "net": -21,
      "sample_size": 1500,
      "population": "All Adults",
      "start_date": "2017-03-24 00:00:00",
      "end_date": "2017-03-26 00:00:00",
      "president_id": 45,
      "created_at": "2017-03-28 05:11:05",
      "updated_at": "2017-03-28 05:11:05",
      "president": {
        "id": 45,
        "name": "Donald Trump",
        "image": "https//upload.wikimedia.org/wikipedia/commons/thumb/5/53/Donald_Trump_official_portrait_%28cropped%29.jpg/165px-Donald_Trump_official_portrait_%28cropped%29.jpg",
        "number": 45,
        "previous_office": "Chairman of The Trump Organization",
        "presidency_url": "https://en.wikipedia.org/wiki/Presidency_of_Donald_Trump",
        "party_affiliation": "Republican",
        "start_date": "2017-01-20 00:00:00",
        "end_date": null,
        "created_at": "2017-03-25 01:57:57",
        "updated_at": "2017-03-25 01:57:57"
      }
    },
    ...
  ]
}
```

Next, we'll take a look at presidential polling data. This API scrapes the results of various polls from [Wikipedia's "United States presidential approval rating"](https://en.wikipedia.org/wiki/United_States_presidential_approval_rating) <strong>every hour</strong> and stores them for fast access. A lot of relevant data is included, such as date range for the polling result, number of individuals polled, and more is included as well. To access, simply use the following request:

### `GET /api/polls`

Along with this open request, there are optional parameters that can be included:

Parameter | Required | Values |Description
--------- | ------- | ------ | -----------
`live` | false | `true` | Scrapes all available polling data in real-time.

With live data, each dataset for a live poll will have a unique, predictable data structure.

<aside class="warning">
NOTE: As a result of using the `live` parameter, the query will take longer because data is being retrieved and scraped in real-time.
</aside>

Available Live Polls:

Poll | Source
--------- | -------
Gallup Poll | [https://goo.gl/uIQWEA](https://goo.gl/uIQWEA)


