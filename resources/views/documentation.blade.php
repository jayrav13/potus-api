<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>POTUS API</title>

    <style>
      .highlight table td { padding: 5px; }
.highlight table pre { margin: 0; }
.highlight .gh {
  color: #999999;
}
.highlight .sr {
  color: #f6aa11;
}
.highlight .go {
  color: #888888;
}
.highlight .gp {
  color: #555555;
}
.highlight .gs {
}
.highlight .gu {
  color: #aaaaaa;
}
.highlight .nb {
  color: #f6aa11;
}
.highlight .cm {
  color: #75715e;
}
.highlight .cp {
  color: #75715e;
}
.highlight .c1 {
  color: #75715e;
}
.highlight .cs {
  color: #75715e;
}
.highlight .c, .highlight .cd {
  color: #75715e;
}
.highlight .err {
  color: #960050;
}
.highlight .gr {
  color: #960050;
}
.highlight .gt {
  color: #960050;
}
.highlight .gd {
  color: #49483e;
}
.highlight .gi {
  color: #49483e;
}
.highlight .ge {
  color: #49483e;
}
.highlight .kc {
  color: #66d9ef;
}
.highlight .kd {
  color: #66d9ef;
}
.highlight .kr {
  color: #66d9ef;
}
.highlight .no {
  color: #66d9ef;
}
.highlight .kt {
  color: #66d9ef;
}
.highlight .mf {
  color: #ae81ff;
}
.highlight .mh {
  color: #ae81ff;
}
.highlight .il {
  color: #ae81ff;
}
.highlight .mi {
  color: #ae81ff;
}
.highlight .mo {
  color: #ae81ff;
}
.highlight .m, .highlight .mb, .highlight .mx {
  color: #ae81ff;
}
.highlight .sc {
  color: #ae81ff;
}
.highlight .se {
  color: #ae81ff;
}
.highlight .ss {
  color: #ae81ff;
}
.highlight .sd {
  color: #e6db74;
}
.highlight .s2 {
  color: #e6db74;
}
.highlight .sb {
  color: #e6db74;
}
.highlight .sh {
  color: #e6db74;
}
.highlight .si {
  color: #e6db74;
}
.highlight .sx {
  color: #e6db74;
}
.highlight .s1 {
  color: #e6db74;
}
.highlight .s {
  color: #e6db74;
}
.highlight .na {
  color: #a6e22e;
}
.highlight .nc {
  color: #a6e22e;
}
.highlight .nd {
  color: #a6e22e;
}
.highlight .ne {
  color: #a6e22e;
}
.highlight .nf {
  color: #a6e22e;
}
.highlight .vc {
  color: #ffffff;
}
.highlight .nn {
  color: #ffffff;
}
.highlight .nl {
  color: #ffffff;
}
.highlight .ni {
  color: #ffffff;
}
.highlight .bp {
  color: #ffffff;
}
.highlight .vg {
  color: #ffffff;
}
.highlight .vi {
  color: #ffffff;
}
.highlight .nv {
  color: #ffffff;
}
.highlight .w {
  color: #ffffff;
}
.highlight {
  color: #ffffff;
}
.highlight .n, .highlight .py, .highlight .nx {
  color: #ffffff;
}
.highlight .ow {
  color: #f92672;
}
.highlight .nt {
  color: #f92672;
}
.highlight .k, .highlight .kv {
  color: #f92672;
}
.highlight .kn {
  color: #f92672;
}
.highlight .kp {
  color: #f92672;
}
.highlight .o {
  color: #f92672;
}
    </style>
    <link href="stylesheets/screen.css" rel="stylesheet" media="screen" />
    <link href="stylesheets/print.css" rel="stylesheet" media="print" />
      <script src="javascripts/all.js"></script>
  </head>

  <body class="index" data-languages="[&quot;shell&quot;]">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="images/navbar.png" alt="Navbar" />
      </span>
    </a>
    <div class="tocify-wrapper">
      <img src="images/logo.png" alt="Logo" />
        <div class="lang-selector">
              <a href="#" data-language-name="shell">shell</a>
        </div>
        <div class="search">
          <input type="text" class="search" id="input-search" placeholder="Search">
        </div>
        <ul class="search-results"></ul>
      <div id="toc">
      </div>
        <ul class="toc-footer">
            <li><a href='https://github.com/tripit/slate'>Documentation Powered by Slate</a></li>
            <li><a href='/home'>Return to API Portal</a></li>
        </ul>
    </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
        <h1 id="introduction">Introduction</h1>

<p>Welcome to the POTUS API! This is a project that comes from an interest in a data source for all things POTUS and Executive Branch. It employs a series of web scrapers to organize and deliver clean data for a variety of related topics.</p>

<h1 id="authentication">Authentication</h1>

<p>Authentication is done by registering a user with this API and using an API key for all requests.</p>

<h2 id="register-user">Register User</h2>

<p>To create a user, visit the <a href="/home">API Portal</a> and register.</p>

<p>Once registered, you will have access to your <code class="prettyprint">API Key</code>. This key should be used for all API requests using the following HTTP Header:</p>

<p><code class="prettyprint">Authorization: Bearer ...</code></p>

<p>Where <code class="prettyprint">...</code> represents the <code class="prettyprint">API Key</code>.</p>

<aside class="warning">
The documentation moving forward will <code>NOT</code> include this denoted header in examples, but this token will be required.
</aside>

<h2 id="get-user">Get User</h2>

<blockquote>
<p>Get the User object:</p>
</blockquote>
<pre class="highlight shell tab-shell"><code><span class="gp">$ </span>curl -i -X GET https://potus-api.herokuapp.com/api/users -H <span class="s2">"Authorization: Bearer ..."</span>
</code></pre>
<p>Once you have an api_token, you can use it to return the User object.</p>

<p>This is a great way to confirm that everything in the Register phase was successful.</p>

<h1 id="leadership">Leadership</h1>

<h2 id="presidents">Presidents</h2>

<blockquote>
<p>Return all US presidents:</p>
</blockquote>
<pre class="highlight shell tab-shell"><code><span class="gp">$ </span>curl -i -X GET http://potus-api.herokuapp.com/api/presidents
</code></pre>
<blockquote>
<p>Sample JSON response:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"George Washington"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"image"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https//upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Gilbert_Stuart_Williamstown_Portrait_of_George_Washington.jpg/165px-Gilbert_Stuart_Williamstown_Portrait_of_George_Washington.jpg"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"number"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="s2">"previous_office"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Commander-in-Chief of the Continental Army"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"presidency_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://en.wikipedia.org/wiki/Presidency_of_George_Washington"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"party_affiliation"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
    </span><span class="s2">"start_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1789-04-30 00:00:00"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"end_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1797-03-04 00:00:00"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:57"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"updated_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:57"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"vice_presidents"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"John Adams"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"image"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https//upload.wikimedia.org/wikipedia/commons/thumb/d/df/Official_Presidential_portrait_of_John_Adams_%28by_John_Trumbull%2C_circa_1792%29.jpg/140px-Official_Presidential_portrait_of_John_Adams_%28by_John_Trumbull%2C_circa_1792%29.jpg"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"number"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="s2">"previous_office"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States Minister to the Court of St. James's"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"party_affiliation"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"start_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1789-04-21 00:00:00"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"end_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1797-03-04 00:00:00"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:58"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updated_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:58"</span><span class="w">
      </span><span class="p">},</span><span class="w">
      </span><span class="err">...</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="err">...</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre>
<p>Let&rsquo;s take a look at endpoints for querying POTUS:</p>

<h3 id="get-api-presidents"><code class="prettyprint">GET /api/presidents</code></h3>

<p>This endpoint&rsquo;s primary use case is to return ALL US presidents as an array. It also accepts the following query string parameters to refine your query:</p>

<table><thead>
<tr>
<th>Parameter</th>
<th>Required</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code class="prettyprint">q</code></td>
<td>false</td>
<td>Query the name of a US president.<br /><br />This searches a president&rsquo;s name given a search query <code class="prettyprint">q</code>.</td>
</tr>
</tbody></table>

<p>The response from this endpoint will always be an array.</p>

<h3 id="get-api-presidents-number"><code class="prettyprint">GET /api/presidents/{number}</code></h3>

<p>This endpoint returns a POTUS given his or her number in succession. For example:</p>

<ul>
<li><code class="prettyprint">GET /api/presidents/1</code> returns <strong>George Washington</strong>.</li>
<li><code class="prettyprint">GET /api/presidents/16</code> returns <strong>Abraham Lincoln</strong>.</li>
</ul>

<p>The response from this endpoint will always be a single object.</p>

<h2 id="vice-presidents">Vice Presidents</h2>

<blockquote>
<p>Return the 1st US vice president:</p>
</blockquote>
<pre class="highlight shell tab-shell"><code><span class="gp">$ </span>curl -i -X GET https://potus-api.herokuapp.com/api/vice_presidents/1
</code></pre>
<blockquote>
<p>Sample JSON response:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
  </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Thomas Jefferson"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"image"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https//upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Thomas_Jefferson_by_Rembrandt_Peale%2C_1800.jpg/140px-Thomas_Jefferson_by_Rembrandt_Peale%2C_1800.jpg"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"number"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
  </span><span class="s2">"previous_office"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1st United States Secretary of State"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"party_affiliation"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Democratic-Republican"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"start_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1797-03-04 00:00:00"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"end_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1801-03-04 00:00:00"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:58"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"updated_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:58"</span><span class="p">,</span><span class="w">
  </span><span class="s2">"presidents"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
      </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"John Adams"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"image"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https//upload.wikimedia.org/wikipedia/commons/thumb/d/df/Official_Presidential_portrait_of_John_Adams_%28by_John_Trumbull%2C_circa_1792%29.jpg/165px-Official_Presidential_portrait_of_John_Adams_%28by_John_Trumbull%2C_circa_1792%29.jpg"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"number"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
      </span><span class="s2">"previous_office"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1st Vice President of the United States"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"presidency_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://en.wikipedia.org/wiki/Presidency_of_John_Adams"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"party_affiliation"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Federalist"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"start_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1797-03-04 00:00:00"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"end_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1801-03-04 00:00:00"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:57"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"updated_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:57"</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>Let&rsquo;s take a look at endpoints for querying VPOTUS:</p>

<h3 id="get-api-vice_presidents"><code class="prettyprint">GET /api/vice_presidents</code></h3>

<p>This endpoint&rsquo;s primary use case is to return ALL US vice presidents as an array. It also accepts the following query string parameters to refine your query:</p>

<table><thead>
<tr>
<th>Parameter</th>
<th>Required</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code class="prettyprint">q</code></td>
<td>false</td>
<td>Query the name of a US vice president.<br /><br />This searches a vice president&rsquo;s name given a search query <code class="prettyprint">q</code>.</td>
</tr>
</tbody></table>

<p>The response from this endpoint will always be an array.</p>

<h3 id="get-api-vice_presidents-number"><code class="prettyprint">GET /api/vice_presidents/{number}</code></h3>

<p>This endpoint returns a VPOTUS given his or her number in succession. For example:</p>

<ul>
<li><code class="prettyprint">GET /api/vice_presidents/1</code> returns <strong>John Adams</strong>.</li>
<li><code class="prettyprint">GET /api/vice_presidents/16</code> returns <strong>Andrew Johnson</strong>.</li>
</ul>

<p>The response from this endpoint will always be a single object.</p>

<h2 id="cabinet-members">Cabinet Members</h2>

<blockquote>
<p>Return the Cabinet Members of the 16th president:</p>
</blockquote>
<pre class="highlight shell tab-shell"><code><span class="gp">$ </span>curl -i -X GET https://potus-api.herokuapp.com/api/presidents/16/cabinet
</code></pre>
<blockquote>
<p>Sample JSON Response:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="err">...</span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">177</span><span class="p">,</span><span class="w">
    </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Simon Cameron"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"department_name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Secretary of War"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"department_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"/wiki/United_States_Secretary_of_War"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"permalink"</span><span class="p">:</span><span class="w"> </span><span class="s2">"secretary-of-war"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://en.wikipedia.org/wiki/Simon_Cameron"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"years"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1861-1862"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"start_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1861-03-05 00:00:00"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"end_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"1862-01-14 00:00:00"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"president_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">16</span><span class="p">,</span><span class="w">
    </span><span class="s2">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-26 07:37:17"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"updated_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-26 07:37:17"</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="err">...</span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre>
<p>Next, let&rsquo;s take a look at Cabinet Members. A president&rsquo;s cabinet can be queried by the following endpoint:</p>

<h3 id="get-api-presidents-number-cabinet"><code class="prettyprint">GET /api/presidents/{number}/cabinet</code></h3>

<p>The response from this endpoint will always be an array.</p>

<h1 id="polls">Polls</h1>

<blockquote>
<p>Retrieve all polls, stored and live:</p>
</blockquote>
<pre class="highlight shell tab-shell"><code><span class="gp">$ </span>curl -i -X GET https://potus-api.herokuapp.com/api/polls?live<span class="o">=</span><span class="nb">true</span>
</code></pre>
<blockquote>
<p>Sample JSON response:</p>
</blockquote>
<pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="s2">"live"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="s2">"gallup"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="s2">"real_unemployment"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"change"</span><span class="p">:</span><span class="w"> </span><span class="mf">-0.2</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Real Unemployment"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"value"</span><span class="p">:</span><span class="w"> </span><span class="mf">9.2</span><span class="w">
      </span><span class="p">},</span><span class="w">
      </span><span class="err">...</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="s2">"recent"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
      </span><span class="s2">"polling_group"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gallup Poll"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"approval"</span><span class="p">:</span><span class="w"> </span><span class="mi">36</span><span class="p">,</span><span class="w">
      </span><span class="s2">"disapproval"</span><span class="p">:</span><span class="w"> </span><span class="mi">57</span><span class="p">,</span><span class="w">
      </span><span class="s2">"unsure"</span><span class="p">:</span><span class="w"> </span><span class="mi">7</span><span class="p">,</span><span class="w">
      </span><span class="s2">"net"</span><span class="p">:</span><span class="w"> </span><span class="mi">-21</span><span class="p">,</span><span class="w">
      </span><span class="s2">"sample_size"</span><span class="p">:</span><span class="w"> </span><span class="mi">1500</span><span class="p">,</span><span class="w">
      </span><span class="s2">"population"</span><span class="p">:</span><span class="w"> </span><span class="s2">"All Adults"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"start_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-24 00:00:00"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"end_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-26 00:00:00"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"president_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">45</span><span class="p">,</span><span class="w">
      </span><span class="s2">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-28 05:11:05"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"updated_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-28 05:11:05"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"president"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="s2">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">45</span><span class="p">,</span><span class="w">
        </span><span class="s2">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Donald Trump"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"image"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https//upload.wikimedia.org/wikipedia/commons/thumb/5/53/Donald_Trump_official_portrait_%28cropped%29.jpg/165px-Donald_Trump_official_portrait_%28cropped%29.jpg"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"number"</span><span class="p">:</span><span class="w"> </span><span class="mi">45</span><span class="p">,</span><span class="w">
        </span><span class="s2">"previous_office"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chairman of The Trump Organization"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"presidency_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://en.wikipedia.org/wiki/Presidency_of_Donald_Trump"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"party_affiliation"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Republican"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"start_date"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-01-20 00:00:00"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"end_date"</span><span class="p">:</span><span class="w"> </span><span class="kc">null</span><span class="p">,</span><span class="w">
        </span><span class="s2">"created_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:57"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"updated_at"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-25 01:57:57"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="err">...</span><span class="w">
  </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
<p>Next, we&rsquo;ll take a look at presidential polling data. This API scrapes the results of various polls from <a href="https://en.wikipedia.org/wiki/United_States_presidential_approval_rating">Wikipedia&rsquo;s &ldquo;United States presidential approval rating&rdquo;</a> <strong>every hour</strong> and stores them for fast access. A lot of relevant data is included, such as date range for the polling result, number of individuals polled, and more is included as well. To access, simply use the following request:</p>

<h3 id="get-api-polls"><code class="prettyprint">GET /api/polls</code></h3>

<p>Along with this open request, there are optional parameters that can be included:</p>

<table><thead>
<tr>
<th>Parameter</th>
<th>Required</th>
<th>Values</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code class="prettyprint">live</code></td>
<td>false</td>
<td><code class="prettyprint">true</code></td>
<td>Scrapes all available polling data in real-time.</td>
</tr>
</tbody></table>

<p>With live data, each dataset for a live poll will have a unique, predictable data structure.</p>

<aside class="warning">
NOTE: As a result of using the `live` parameter, the query will take longer because data is being retrieved and scraped in real-time.
</aside>

<p>Available Live Polls:</p>

<table><thead>
<tr>
<th>Poll</th>
<th>Source</th>
</tr>
</thead><tbody>
<tr>
<td>Gallup Poll</td>
<td><a href="https://goo.gl/uIQWEA">https://goo.gl/uIQWEA</a></td>
</tr>
</tbody></table>

      </div>
      <div class="dark-box">
          <div class="lang-selector">
                <a href="#" data-language-name="shell">shell</a>
          </div>
      </div>
    </div>
  </body>
</html>
