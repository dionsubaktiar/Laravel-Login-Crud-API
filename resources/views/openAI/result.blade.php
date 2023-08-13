<!DOCTYPE html>
<html>

<head>
    <title>OpenAI Demo Result</title>
    <style>
        /* CSS styles for the result page */
        /* ... (Same styles as provided in the previous code snippet) ... */
        body {
            font-family: Arial, sans-serif;
            background-color: #f1e9db;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #3a3833;
            color: #f1e9db;
            padding: 20px;
            margin: 0;
        }

        h3 {
            color: #3a3833;
            margin-bottom: 10px;
        }

        p {
            color: #584e45;
            padding: 10px;
            border: 1px solid #d3c8ba;
            background-color: #e8e1d4;
            margin: 20px;
            border-radius: 5px;
        }

        a {
            color: #3a3833;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        pre {
            background-color: #f5f5f5;
            padding: 10px;
            overflow-x: auto;
            font-family: Consolas, monospace;
        }
    </style>
</head>

<body>
    <h1>OpenAI Demo Result</h1>
    <h3>Prompt:</h3>
    <p>{{ $prompt }}</p>
    <h3>Completion:</h3>
    @if (str_contains($completion, '<code>'))
        {!! $completion !!}
    @else
        <p>{{ $completion }}</p>
    @endif
    <a href="/">Go Back to Dashboard</a>
</body>

</html>
