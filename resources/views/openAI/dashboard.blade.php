<!DOCTYPE html>
<html>

<head>
    <title>OpenAI Demo</title>
    <style>
        body {
            font-family: 'MyFont', sans-serif;
            background-color: #f1e9db;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-family: 'MyFont', sans-serif;
            background-color: #3a3833;
            color: #f1e9db;
            padding: 20px;
            margin: 0;
        }

        form {
            font-family: 'MyFont', sans-serif;
            background-color: #e8e1d4;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #3a3833;
        }

        textarea {
            font-family: 'MyFont', sans-serif;
            width: 100%;
            resize: none;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #d3c8ba;
            /* Earthy background color */
        }

        button {
            font-family: 'MyFont', sans-serif;
            background-color: #3a3833;
            color: #f1e9db;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #584e45;
        }

        /* Media Queries for Responsive Layout */
        @media (max-width: 768px) {
            form {
                margin: 10px;
                padding: 10px;
            }

            h1 {
                font-size: 24px;
                padding: 10px;
            }
        }
    </style>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>OpenAI Demo Dashboard</h1>
    <form action="/process" method="POST">
        @csrf
        <label for="prompt">Enter a prompt:</label>
        <textarea name="prompt" id="prompt" rows="5" cols="50"></textarea>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
