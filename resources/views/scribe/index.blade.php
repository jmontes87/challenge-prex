<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Challenge Prex</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
                    body .content .php-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.35.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.35.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;,&quot;php&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
            <img src="../logo_prex.png" alt="logo" class="logo" style="padding-top: 10px;" width="100%"/>
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                            <button type="button" class="lang-button" data-language-name="php">php</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-giphy">
                                <a href="#endpoints-POSTapi-giphy">store favorite gift</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-giphy-search">
                                <a href="#endpoints-GETapi-giphy-search">search gif</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-giphy--id--img">
                                <a href="#endpoints-GETapi-giphy--id--img">get gif by ID.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-user-login">
                                <a href="#endpoints-POSTapi-user-login">login</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: May 22, 2024</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {ACCESS_TOKEN}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-giphy">store favorite gift</h2>

<p>
</p>



<span id="example-requests-POSTapi-giphy">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/giphy" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"alias\": \"Big dog\",
    \"id\": \"3o7527pa7qs9kCG78A\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/giphy"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "alias": "Big dog",
    "id": "3o7527pa7qs9kCG78A"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/giphy';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'alias' =&gt; 'Big dog',
            'id' =&gt; '3o7527pa7qs9kCG78A',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-giphy">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;GIF almacenado correctamente&quot;,
    &quot;data&quot;: {
        &quot;headers&quot;: {},
        &quot;original&quot;: {
            &quot;gif_id&quot;: &quot;3o7527pa7qs9kCG78A&quot;,
            &quot;alias&quot;: &quot;Test&quot;,
            &quot;user_id&quot;: 2,
            &quot;updated_at&quot;: &quot;2024-05-21T19:57:34.000000Z&quot;,
            &quot;created_at&quot;: &quot;2024-05-21T19:57:34.000000Z&quot;,
            &quot;id&quot;: 3
        },
        &quot;exception&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-giphy" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-giphy"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-giphy"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-giphy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-giphy">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-giphy" data-method="POST"
      data-path="api/giphy"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-giphy', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-giphy"
                    onclick="tryItOut('POSTapi-giphy');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-giphy"
                    onclick="cancelTryOut('POSTapi-giphy');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-giphy"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/giphy</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-giphy"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-giphy"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>alias</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="alias"                data-endpoint="POSTapi-giphy"
               value="Big dog"
               data-component="body">
    <br>
<p>Alias for GIFs. Example: <code>Big dog</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-giphy"
               value="3o7527pa7qs9kCG78A"
               data-component="body">
    <br>
<p>Id by Giphy. Example: <code>3o7527pa7qs9kCG78A</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-giphy-search">search gif</h2>

<p>
</p>



<span id="example-requests-GETapi-giphy-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/giphy/search" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"query\": \"cute cats\",
    \"limit\": 10,
    \"offset\": 0
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/giphy/search"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "query": "cute cats",
    "limit": 10,
    "offset": 0
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/giphy/search';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'query' =&gt; 'cute cats',
            'limit' =&gt; 10,
            'offset' =&gt; 0,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-giphy-search">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;type&quot;: &quot;gif&quot;,
            &quot;id&quot;: &quot;3o7527pa7qs9kCG78A&quot;,
            &quot;url&quot;: &quot;https://giphy.com/gifs/nehumanesociety-funny-dog-3o7527pa7qs9kCG78A&quot;,
            &quot;slug&quot;: &quot;nehumanesociety-funny-dog-3o7527pa7qs9kCG78A&quot;,
            &quot;title&quot;: &quot;What Is It Reaction GIF by Nebraska Humane Society&quot;,
            &quot;is_sticker&quot;: 0,
            &quot;images&quot;: {
                &quot;original&quot;: {
                    &quot;height&quot;: &quot;480&quot;,
                    &quot;width&quot;: &quot;480&quot;,
                    &quot;size&quot;: &quot;2789736&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=giphy.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;352829&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=giphy.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;494382&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=giphy.webp&amp;ct=g&quot;,
                    &quot;frames&quot;: &quot;48&quot;,
                    &quot;hash&quot;: &quot;d1326125030ebdcb85f94ce833acb8f2&quot;
                },
                &quot;fixed_height&quot;: {
                    &quot;height&quot;: &quot;200&quot;,
                    &quot;width&quot;: &quot;200&quot;,
                    &quot;size&quot;: &quot;539105&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;78904&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;198818&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200.webp&amp;ct=g&quot;
                },
                &quot;fixed_height_downsampled&quot;: {
                    &quot;height&quot;: &quot;200&quot;,
                    &quot;width&quot;: &quot;200&quot;,
                    &quot;size&quot;: &quot;73493&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200_d.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200_d.gif&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;44672&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200_d.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200_d.webp&amp;ct=g&quot;
                },
                &quot;fixed_height_small&quot;: {
                    &quot;height&quot;: &quot;100&quot;,
                    &quot;width&quot;: &quot;100&quot;,
                    &quot;size&quot;: &quot;195611&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;32643&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;96772&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100.webp&amp;ct=g&quot;
                },
                &quot;fixed_width&quot;: {
                    &quot;height&quot;: &quot;200&quot;,
                    &quot;width&quot;: &quot;200&quot;,
                    &quot;size&quot;: &quot;539105&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;78904&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;198818&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w.webp&amp;ct=g&quot;
                },
                &quot;fixed_width_downsampled&quot;: {
                    &quot;height&quot;: &quot;200&quot;,
                    &quot;width&quot;: &quot;200&quot;,
                    &quot;size&quot;: &quot;73493&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w_d.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w_d.gif&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;44672&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w_d.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w_d.webp&amp;ct=g&quot;
                },
                &quot;fixed_width_small&quot;: {
                    &quot;height&quot;: &quot;100&quot;,
                    &quot;width&quot;: &quot;100&quot;,
                    &quot;size&quot;: &quot;195611&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100w.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100w.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;32643&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100w.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100w.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;96772&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100w.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100w.webp&amp;ct=g&quot;
                }
            },
            &quot;alt_text&quot;: &quot;Video gif. A black and white pitbull terrier leans back with its tongue hanging out then tilts its head down to the side with a perplexed look. Text, \&quot;What?\&quot;&quot;
        },
        {
            &quot;type&quot;: &quot;gif&quot;,
            &quot;id&quot;: &quot;Fu3OjBQiCs3s0ZuLY3&quot;,
            &quot;url&quot;: &quot;https://giphy.com/gifs/moodman-reaction-Fu3OjBQiCs3s0ZuLY3&quot;,
            &quot;slug&quot;: &quot;moodman-reaction-Fu3OjBQiCs3s0ZuLY3&quot;,
            &quot;title&quot;: &quot;Dog Smile GIF by MOODMAN&quot;,
            &quot;is_sticker&quot;: 0,
            &quot;images&quot;: {
                &quot;original&quot;: {
                    &quot;height&quot;: &quot;356&quot;,
                    &quot;width&quot;: &quot;200&quot;,
                    &quot;size&quot;: &quot;6229447&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/giphy.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=giphy.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;10123487&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/giphy.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=giphy.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;3273720&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/giphy.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=giphy.webp&amp;ct=g&quot;,
                    &quot;frames&quot;: &quot;225&quot;,
                    &quot;hash&quot;: &quot;4f9bc197210d75302db460e6f1e51651&quot;
                },
                &quot;fixed_height&quot;: {
                    &quot;height&quot;: &quot;200&quot;,
                    &quot;width&quot;: &quot;112&quot;,
                    &quot;size&quot;: &quot;2718689&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;357336&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;938578&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200.webp&amp;ct=g&quot;
                },
                &quot;fixed_height_downsampled&quot;: {
                    &quot;height&quot;: &quot;200&quot;,
                    &quot;width&quot;: &quot;112&quot;,
                    &quot;size&quot;: &quot;75959&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200_d.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200_d.gif&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;39406&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200_d.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200_d.webp&amp;ct=g&quot;
                },
                &quot;fixed_height_small&quot;: {
                    &quot;height&quot;: &quot;100&quot;,
                    &quot;width&quot;: &quot;56&quot;,
                    &quot;size&quot;: &quot;823081&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/100.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;125145&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/100.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;404724&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/100.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100.webp&amp;ct=g&quot;
                },
                &quot;fixed_width&quot;: {
                    &quot;height&quot;: &quot;356&quot;,
                    &quot;width&quot;: &quot;200&quot;,
                    &quot;size&quot;: &quot;5373936&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200w.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;1504383&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200w.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;3285966&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200w.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w.webp&amp;ct=g&quot;
                },
                &quot;fixed_width_downsampled&quot;: {
                    &quot;height&quot;: &quot;356&quot;,
                    &quot;width&quot;: &quot;200&quot;,
                    &quot;size&quot;: &quot;185594&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200w_d.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w_d.gif&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;115364&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/200w_d.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w_d.webp&amp;ct=g&quot;
                },
                &quot;fixed_width_small&quot;: {
                    &quot;height&quot;: &quot;178&quot;,
                    &quot;width&quot;: &quot;100&quot;,
                    &quot;size&quot;: &quot;2173841&quot;,
                    &quot;url&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/100w.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100w.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;43180&quot;,
                    &quot;mp4&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/100w.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100w.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;826244&quot;,
                    &quot;webp&quot;: &quot;https://media2.giphy.com/media/Fu3OjBQiCs3s0ZuLY3/100w.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100w.webp&amp;ct=g&quot;
                }
            },
            &quot;alt_text&quot;: &quot;Video gif. A close-up of a white dog with sprigs of tiny flowers on its head as it appears to smile with squinty eyes and teeth bared. &quot;
        },
        {
            &quot;type&quot;: &quot;gif&quot;,
            &quot;id&quot;: &quot;gKHGnB1ml0moQdjhEJ&quot;,
            &quot;url&quot;: &quot;https://giphy.com/gifs/moodman-reaction-dog-zoom-gKHGnB1ml0moQdjhEJ&quot;,
            &quot;slug&quot;: &quot;moodman-reaction-dog-zoom-gKHGnB1ml0moQdjhEJ&quot;,
            &quot;title&quot;: &quot;Confused Dog GIF by MOODMAN&quot;,
            &quot;is_sticker&quot;: 0,
            &quot;images&quot;: {
                &quot;original&quot;: {
                    &quot;height&quot;: &quot;406&quot;,
                    &quot;width&quot;: &quot;480&quot;,
                    &quot;size&quot;: &quot;1594135&quot;,
                    &quot;url&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/giphy.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=giphy.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;112515&quot;,
                    &quot;mp4&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/giphy.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=giphy.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;237244&quot;,
                    &quot;webp&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/giphy.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=giphy.webp&amp;ct=g&quot;,
                    &quot;frames&quot;: &quot;29&quot;,
                    &quot;hash&quot;: &quot;dee77f6b73217a5a9ac650d776423a1c&quot;
                },
                &quot;fixed_height&quot;: {
                    &quot;height&quot;: &quot;200&quot;,
                    &quot;width&quot;: &quot;236&quot;,
                    &quot;size&quot;: &quot;388642&quot;,
                    &quot;url&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;39650&quot;,
                    &quot;mp4&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;108988&quot;,
                    &quot;webp&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200.webp&amp;ct=g&quot;
                },
                &quot;fixed_height_downsampled&quot;: {
                    &quot;height&quot;: &quot;200&quot;,
                    &quot;width&quot;: &quot;236&quot;,
                    &quot;size&quot;: &quot;105764&quot;,
                    &quot;url&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200_d.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200_d.gif&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;46902&quot;,
                    &quot;webp&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200_d.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200_d.webp&amp;ct=g&quot;
                },
                &quot;fixed_height_small&quot;: {
                    &quot;height&quot;: &quot;100&quot;,
                    &quot;width&quot;: &quot;118&quot;,
                    &quot;size&quot;: &quot;137927&quot;,
                    &quot;url&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/100.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;20417&quot;,
                    &quot;mp4&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/100.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;55222&quot;,
                    &quot;webp&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/100.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100.webp&amp;ct=g&quot;
                },
                &quot;fixed_width&quot;: {
                    &quot;height&quot;: &quot;169&quot;,
                    &quot;width&quot;: &quot;200&quot;,
                    &quot;size&quot;: &quot;320424&quot;,
                    &quot;url&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200w.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;32849&quot;,
                    &quot;mp4&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200w.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;92446&quot;,
                    &quot;webp&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200w.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w.webp&amp;ct=g&quot;
                },
                &quot;fixed_width_downsampled&quot;: {
                    &quot;height&quot;: &quot;169&quot;,
                    &quot;width&quot;: &quot;200&quot;,
                    &quot;size&quot;: &quot;70948&quot;,
                    &quot;url&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200w_d.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w_d.gif&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;37140&quot;,
                    &quot;webp&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/200w_d.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=200w_d.webp&amp;ct=g&quot;
                },
                &quot;fixed_width_small&quot;: {
                    &quot;height&quot;: &quot;85&quot;,
                    &quot;width&quot;: &quot;100&quot;,
                    &quot;size&quot;: &quot;110923&quot;,
                    &quot;url&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/100w.gif?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100w.gif&amp;ct=g&quot;,
                    &quot;mp4_size&quot;: &quot;17804&quot;,
                    &quot;mp4&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/100w.mp4?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100w.mp4&amp;ct=g&quot;,
                    &quot;webp_size&quot;: &quot;46454&quot;,
                    &quot;webp&quot;: &quot;https://media0.giphy.com/media/gKHGnB1ml0moQdjhEJ/100w.webp?cid=bcba9ff9zdbbxzfl8tdf57xuj8vjvd45ssd0ylcgxo7008g5&amp;ep=v1_gifs_search&amp;rid=100w.webp&amp;ct=g&quot;
                }
            },
            &quot;alt_text&quot;: &quot;&quot;
        }
    ],
    &quot;meta&quot;: {
        &quot;status&quot;: {
            &quot;type&quot;: null,
            &quot;id&quot;: null,
            &quot;url&quot;: null,
            &quot;slug&quot;: null,
            &quot;title&quot;: null,
            &quot;is_sticker&quot;: null,
            &quot;images&quot;: null,
            &quot;alt_text&quot;: null
        },
        &quot;msg&quot;: {
            &quot;type&quot;: null,
            &quot;id&quot;: null,
            &quot;url&quot;: null,
            &quot;slug&quot;: null,
            &quot;title&quot;: null,
            &quot;is_sticker&quot;: null,
            &quot;images&quot;: null,
            &quot;alt_text&quot;: null
        },
        &quot;response_id&quot;: {
            &quot;type&quot;: null,
            &quot;id&quot;: null,
            &quot;url&quot;: null,
            &quot;slug&quot;: null,
            &quot;title&quot;: null,
            &quot;is_sticker&quot;: null,
            &quot;images&quot;: null,
            &quot;alt_text&quot;: null
        }
    },
    &quot;pagination&quot;: {
        &quot;total_count&quot;: {
            &quot;type&quot;: null,
            &quot;id&quot;: null,
            &quot;url&quot;: null,
            &quot;slug&quot;: null,
            &quot;title&quot;: null,
            &quot;is_sticker&quot;: null,
            &quot;images&quot;: null,
            &quot;alt_text&quot;: null
        },
        &quot;count&quot;: {
            &quot;type&quot;: null,
            &quot;id&quot;: null,
            &quot;url&quot;: null,
            &quot;slug&quot;: null,
            &quot;title&quot;: null,
            &quot;is_sticker&quot;: null,
            &quot;images&quot;: null,
            &quot;alt_text&quot;: null
        },
        &quot;offset&quot;: {
            &quot;type&quot;: null,
            &quot;id&quot;: null,
            &quot;url&quot;: null,
            &quot;slug&quot;: null,
            &quot;title&quot;: null,
            &quot;is_sticker&quot;: null,
            &quot;images&quot;: null,
            &quot;alt_text&quot;: null
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-giphy-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-giphy-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-giphy-search"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-giphy-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-giphy-search">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-giphy-search" data-method="GET"
      data-path="api/giphy/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-giphy-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-giphy-search"
                    onclick="tryItOut('GETapi-giphy-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-giphy-search"
                    onclick="cancelTryOut('GETapi-giphy-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-giphy-search"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/giphy/search</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-giphy-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-giphy-search"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>query</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="query"                data-endpoint="GETapi-giphy-search"
               value="cute cats"
               data-component="body">
    <br>
<p>The search query for GIFs. Example: <code>cute cats</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-giphy-search"
               value="10"
               data-component="body">
    <br>
<p>The maximum number of results to be returned. Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>offset</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="offset"                data-endpoint="GETapi-giphy-search"
               value="0"
               data-component="body">
    <br>
<p>The offset of search results. Example: <code>0</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-giphy--id--img">get gif by ID.</h2>

<p>
</p>



<span id="example-requests-GETapi-giphy--id--img">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/giphy/totam/img" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/giphy/totam/img"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/giphy/totam/img';
$response = $client-&gt;get(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-GETapi-giphy--id--img">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;type&quot;: &quot;gif&quot;,
        &quot;id&quot;: &quot;3o7527pa7qs9kCG78A&quot;,
        &quot;url&quot;: &quot;https://giphy.com/gifs/nehumanesociety-funny-dog-3o7527pa7qs9kCG78A&quot;,
        &quot;slug&quot;: &quot;nehumanesociety-funny-dog-3o7527pa7qs9kCG78A&quot;,
        &quot;title&quot;: &quot;What Is It Reaction GIF by Nebraska Humane Society&quot;,
        &quot;is_sticker&quot;: 0,
        &quot;images&quot;: {
            &quot;original&quot;: {
                &quot;height&quot;: &quot;480&quot;,
                &quot;width&quot;: &quot;480&quot;,
                &quot;size&quot;: &quot;2789736&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy.gif&amp;ct=g&quot;,
                &quot;mp4_size&quot;: &quot;352829&quot;,
                &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy.mp4?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy.mp4&amp;ct=g&quot;,
                &quot;webp_size&quot;: &quot;494382&quot;,
                &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy.webp?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy.webp&amp;ct=g&quot;,
                &quot;frames&quot;: &quot;48&quot;,
                &quot;hash&quot;: &quot;d1326125030ebdcb85f94ce833acb8f2&quot;
            },
            &quot;downsized&quot;: {
                &quot;height&quot;: &quot;480&quot;,
                &quot;width&quot;: &quot;480&quot;,
                &quot;size&quot;: &quot;1810432&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy-downsized.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy-downsized.gif&amp;ct=g&quot;
            },
            &quot;downsized_large&quot;: {
                &quot;height&quot;: &quot;480&quot;,
                &quot;width&quot;: &quot;480&quot;,
                &quot;size&quot;: &quot;2789736&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy.gif&amp;ct=g&quot;
            },
            &quot;downsized_medium&quot;: {
                &quot;height&quot;: &quot;480&quot;,
                &quot;width&quot;: &quot;480&quot;,
                &quot;size&quot;: &quot;2789736&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy.gif&amp;ct=g&quot;
            },
            &quot;downsized_small&quot;: {
                &quot;height&quot;: &quot;360&quot;,
                &quot;width&quot;: &quot;360&quot;,
                &quot;mp4_size&quot;: &quot;102077&quot;,
                &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy-downsized-small.mp4?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy-downsized-small.mp4&amp;ct=g&quot;
            },
            &quot;downsized_still&quot;: {
                &quot;height&quot;: &quot;480&quot;,
                &quot;width&quot;: &quot;480&quot;,
                &quot;size&quot;: &quot;37517&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy-downsized_s.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy-downsized_s.gif&amp;ct=g&quot;
            },
            &quot;fixed_height&quot;: {
                &quot;height&quot;: &quot;200&quot;,
                &quot;width&quot;: &quot;200&quot;,
                &quot;size&quot;: &quot;539105&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200.gif&amp;ct=g&quot;,
                &quot;mp4_size&quot;: &quot;78904&quot;,
                &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200.mp4?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200.mp4&amp;ct=g&quot;,
                &quot;webp_size&quot;: &quot;198818&quot;,
                &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200.webp?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200.webp&amp;ct=g&quot;
            },
            &quot;fixed_height_downsampled&quot;: {
                &quot;height&quot;: &quot;200&quot;,
                &quot;width&quot;: &quot;200&quot;,
                &quot;size&quot;: &quot;73493&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200_d.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200_d.gif&amp;ct=g&quot;,
                &quot;webp_size&quot;: &quot;44672&quot;,
                &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200_d.webp?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200_d.webp&amp;ct=g&quot;
            },
            &quot;fixed_height_small&quot;: {
                &quot;height&quot;: &quot;100&quot;,
                &quot;width&quot;: &quot;100&quot;,
                &quot;size&quot;: &quot;195611&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=100.gif&amp;ct=g&quot;,
                &quot;mp4_size&quot;: &quot;32643&quot;,
                &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100.mp4?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=100.mp4&amp;ct=g&quot;,
                &quot;webp_size&quot;: &quot;96772&quot;,
                &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100.webp?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=100.webp&amp;ct=g&quot;
            },
            &quot;fixed_height_small_still&quot;: {
                &quot;height&quot;: &quot;100&quot;,
                &quot;width&quot;: &quot;100&quot;,
                &quot;size&quot;: &quot;4793&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100_s.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=100_s.gif&amp;ct=g&quot;
            },
            &quot;fixed_height_still&quot;: {
                &quot;height&quot;: &quot;200&quot;,
                &quot;width&quot;: &quot;200&quot;,
                &quot;size&quot;: &quot;11618&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200_s.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200_s.gif&amp;ct=g&quot;
            },
            &quot;fixed_width&quot;: {
                &quot;height&quot;: &quot;200&quot;,
                &quot;width&quot;: &quot;200&quot;,
                &quot;size&quot;: &quot;539105&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200w.gif&amp;ct=g&quot;,
                &quot;mp4_size&quot;: &quot;78904&quot;,
                &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w.mp4?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200w.mp4&amp;ct=g&quot;,
                &quot;webp_size&quot;: &quot;198818&quot;,
                &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w.webp?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200w.webp&amp;ct=g&quot;
            },
            &quot;fixed_width_downsampled&quot;: {
                &quot;height&quot;: &quot;200&quot;,
                &quot;width&quot;: &quot;200&quot;,
                &quot;size&quot;: &quot;73493&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w_d.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200w_d.gif&amp;ct=g&quot;,
                &quot;webp_size&quot;: &quot;44672&quot;,
                &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w_d.webp?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200w_d.webp&amp;ct=g&quot;
            },
            &quot;fixed_width_small&quot;: {
                &quot;height&quot;: &quot;100&quot;,
                &quot;width&quot;: &quot;100&quot;,
                &quot;size&quot;: &quot;195611&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100w.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=100w.gif&amp;ct=g&quot;,
                &quot;mp4_size&quot;: &quot;32643&quot;,
                &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100w.mp4?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=100w.mp4&amp;ct=g&quot;,
                &quot;webp_size&quot;: &quot;96772&quot;,
                &quot;webp&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100w.webp?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=100w.webp&amp;ct=g&quot;
            },
            &quot;fixed_width_small_still&quot;: {
                &quot;height&quot;: &quot;100&quot;,
                &quot;width&quot;: &quot;100&quot;,
                &quot;size&quot;: &quot;4793&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/100w_s.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=100w_s.gif&amp;ct=g&quot;
            },
            &quot;fixed_width_still&quot;: {
                &quot;height&quot;: &quot;200&quot;,
                &quot;width&quot;: &quot;200&quot;,
                &quot;size&quot;: &quot;11618&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/200w_s.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=200w_s.gif&amp;ct=g&quot;
            },
            &quot;looping&quot;: {
                &quot;mp4_size&quot;: &quot;1536445&quot;,
                &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy-loop.mp4?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy-loop.mp4&amp;ct=g&quot;
            },
            &quot;original_still&quot;: {
                &quot;height&quot;: &quot;480&quot;,
                &quot;width&quot;: &quot;480&quot;,
                &quot;size&quot;: &quot;58463&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy_s.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy_s.gif&amp;ct=g&quot;
            },
            &quot;original_mp4&quot;: {
                &quot;height&quot;: &quot;480&quot;,
                &quot;width&quot;: &quot;480&quot;,
                &quot;mp4_size&quot;: &quot;352829&quot;,
                &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy.mp4?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy.mp4&amp;ct=g&quot;
            },
            &quot;preview&quot;: {
                &quot;height&quot;: &quot;320&quot;,
                &quot;width&quot;: &quot;320&quot;,
                &quot;mp4_size&quot;: &quot;37843&quot;,
                &quot;mp4&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy-preview.mp4?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy-preview.mp4&amp;ct=g&quot;
            },
            &quot;preview_gif&quot;: {
                &quot;height&quot;: &quot;126&quot;,
                &quot;width&quot;: &quot;126&quot;,
                &quot;size&quot;: &quot;48475&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy-preview.gif?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy-preview.gif&amp;ct=g&quot;
            },
            &quot;preview_webp&quot;: {
                &quot;height&quot;: &quot;224&quot;,
                &quot;width&quot;: &quot;224&quot;,
                &quot;size&quot;: &quot;47558&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/giphy-preview.webp?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=giphy-preview.webp&amp;ct=g&quot;
            },
            &quot;480w_still&quot;: {
                &quot;height&quot;: &quot;480&quot;,
                &quot;width&quot;: &quot;480&quot;,
                &quot;size&quot;: &quot;2789736&quot;,
                &quot;url&quot;: &quot;https://media2.giphy.com/media/3o7527pa7qs9kCG78A/480w_s.jpg?cid=bcba9ff91xh45pzh5312bgogbqhwan0z8wgg36uftdmsucy3&amp;ep=v1_gifs_gifId&amp;rid=480w_s.jpg&amp;ct=g&quot;
            }
        },
        &quot;alt_text&quot;: &quot;Video gif. A black and white pitbull terrier leans back with its tongue hanging out then tilts its head down to the side with a perplexed look. Text, \&quot;What?\&quot;&quot;
    },
    &quot;meta&quot;: {
        &quot;type&quot;: null,
        &quot;id&quot;: null,
        &quot;url&quot;: null,
        &quot;slug&quot;: null,
        &quot;title&quot;: null,
        &quot;is_sticker&quot;: null,
        &quot;images&quot;: null,
        &quot;alt_text&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-giphy--id--img" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-giphy--id--img"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-giphy--id--img"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-giphy--id--img" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-giphy--id--img">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-giphy--id--img" data-method="GET"
      data-path="api/giphy/{id}/img"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-giphy--id--img', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-giphy--id--img"
                    onclick="tryItOut('GETapi-giphy--id--img');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-giphy--id--img"
                    onclick="cancelTryOut('GETapi-giphy--id--img');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-giphy--id--img"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/giphy/{id}/img</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-giphy--id--img"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-giphy--id--img"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-giphy--id--img"
               value="totam"
               data-component="url">
    <br>
<p>The ID of the giphy. Example: <code>totam</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-user-login">login</h2>

<p>
</p>



<span id="example-requests-POSTapi-user-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/user/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"john@example.com\",
    \"password\": \"secret\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "john@example.com",
    "password": "secret"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>


<div class="php-example">
    <pre><code class="language-php">$client = new \GuzzleHttp\Client();
$url = 'http://localhost:8000/api/user/login';
$response = $client-&gt;post(
    $url,
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'email' =&gt; 'john@example.com',
            'password' =&gt; 'secret',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-login">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;token&quot;: &quot;HASH_TOKEN&quot;,
        &quot;expires_at&quot;: &quot;2024-11-20 14:20:28&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-user-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-user-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-user-login" data-method="POST"
      data-path="api/user/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user-login"
                    onclick="tryItOut('POSTapi-user-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user-login"
                    onclick="cancelTryOut('POSTapi-user-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-user-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-user-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-user-login"
               value="john@example.com"
               data-component="body">
    <br>
<p>The email address of the user. Must be a valid email address. Example: <code>john@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-user-login"
               value="secret"
               data-component="body">
    <br>
<p>The password of the user. Example: <code>secret</code></p>
        </div>
        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                                                        <button type="button" class="lang-button" data-language-name="php">php</button>
                            </div>
            </div>
</div>
</body>
</html>
