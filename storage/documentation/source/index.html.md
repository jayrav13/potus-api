---
title: POTUS API

language_tabs:
  - shell

toc_footers:
  - <a href='https://github.com/tripit/slate'>Documentation Powered by Slate</a>

search: true
---

# Introduction

Welcome to the POTUS API! This is a project that comes from an interest in a data source for all things POTUS and Executive Branch. It employs a series of web scrapers to organize and deliver clean data for a variety of related topics.

# Authentication

Authentication is done by registering a user with this API and using an API key for all requests.

## Register User

> Register a user with the following request:

```shell
$ curl \
    -i \
    -X POST
    https://potus-api.herokuapp.com/api/users \
    -H "Content-Type: application/json" \
    -d '{
      "name": "Jay Ravaliya",
      "email": "jayrav13@gmail.com",
      "password": "password"
    }'
```

> The above returns the following JSON:

```json
{
  "user": {
    "name": "Jay Ravaliya",
    "email": "jayrav13@gmail.com",
    "updated_at": "2017-03-25 05:09:33",
    "created_at": "2017-03-25 05:09:33",
    "id": 1
  },
  "api_token": "..."
}
```

Register a user by sending a request to the endpoint `POST /api/users` with the following keys in a JSON object in the HTTP body:

Parameter | Required | Description
--------- | ------- | -----------
name | true | A name must be included.
email | true | A valid email address must be included.
password | true | min. 8, max. 16 characters.

This request returns a token in the key `api_token` in the response. This token should then be used for all future requests through the HTTP header as follows:

`Authorization: Bearer ...`

Where `...` represents the `api_token`.

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
`q` | false | Query the name of a US president.<br /><br />This searches a vice president's name given a search query `q`.

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
`q` | false | Query the name of a US vice president.<br /><br />This searches a president's name given a search query `q`.

The response from this endpoint will always be an array.

### `GET /api/vice_presidents/{number}`

This endpoint returns a VPOTUS given his or her number in succession. For example:

- `GET /api/vice_presidents/1` returns <strong>John Adams</strong>.
- `GET /api/vice_presidents/16` returns <strong>Andrew Johnson</strong>.

The response from this endpoint will always be a single object.
