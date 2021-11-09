<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            min-width: 100vw;
            background-color: greenyellow;
        }

        .main {
            display: flex;
            flex-direction: column;
            /* height: 100%; */
            width: 75%;
            align-items: center;
            background-color: skyblue;

        }

        .first_part {
            background-color: red;
            width: 100%;

        }

        .f1 {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: space-evenly;
        }

        .f2,
        .s1 {
            display: flex;
            width: 100%;
            align-items: center;
            justify-content: space-evenly;
        }

        .f21,
        .f22,
        .s12,
        .s11 {
            display: flex;
            flex-direction: column;
        }

        .second_part {
            width: 100%;
            background-color: blue;
        }

        .third_part {
            width: 100%;
            background-color: violet;
        }

        .forth_part {
            width: 100%;
            background-color: yellow;
        }

        .tabcontainer {
            overflow-x: auto;
        }

        .tab {
            width: 80%;
            text-align: center;
            margin: auto;
            border-collapse: collapse;
            border-width: 1px;
            border-color: white;
            border-style: solid;

        }

        .tab tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tab tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .tab tr:first-child,
        th {
            color: white;
            padding: 0.5rem;
            background-color: tomato;

        }

        td,
        th {
            border-width: 0.1rem;
            border-color: white;
            border-style: solid;
        }

        td,
        th {
            font-size: 1.2rem;
            padding: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="first_part">
            <div class="f1">
                <h1>Invoice</h1>
                <h1>Barcode</h1>
            </div>
            <div class="f2">
                <div class="f21">
                    <h4>Service number: 123456789</h4>
                    <h4>Service number: 123456789</h4>
                    <h4>Service number: 123456789</h4>
                    <h4>Service number: 123456789</h4>
                </div>
                <div class="f22">
                    <h4>Service number: 123456789</h4>
                    <h4>Service number: 123456789</h4>
                    <h4>Service number: 123456789</h4>
                    <h4>Service number: 123456789</h4>
                </div>
            </div>
        </div>
        <hr style="width: 100%;color:black;height:3px">
        <div class="second_part">
            <div class="s1">
                <div class="s11">
                    <h3>ship to</h3>
                    <h4>address</h4>
                    <h4>address</h4>
                    <h4>Customer type:unregistered</h4>
                </div>
                <div class="s12">
                    <h3>Seller details</h3>
                    <h4>address</h4>
                    <h4>address</h4>
                    <h4>GSTIN number:12345678t65r4</h4>
                </div>
            </div>
        </div>
        <hr style="width: 100%;color:black;height:3px">
        <div class="third_part">

            <div class="tabcontainer">
                <table class="tab">
                    
                    <tr>
                        <th>Gross Amount</th>
                        <th>Discount</th>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>Total amount</th>
                    </tr>
                </table>

            </div>



        </div>
        <div class="forth_part">adasf</div>
    </div>
</body>

</html>