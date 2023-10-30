<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>🇵🇸 Palestine 🇮🇱 Israel Story</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<h1 class="text-5xl">🇵🇸 Palestine 🇮🇱 Israel Story</h1>
<?php
    $csv = array_map('str_getcsv', file("data.csv"));
    array_shift($csv)
?>
<div class="selector">
    <?php
        $marginCounter = 2;
        foreach ($csv as $index => $record) {
            echo "<a class=\"top-[${marginCounter}vh] md:top-0\" href=\"#section_${record[0]}\"><p class=\"text-base\">${record[0]}</p><strong>${record[1]}</strong></a>";
            $marginCounter += 4;
        }
    ?>
</div>
<ul class="timeline">
    <?php
        $csv2 = array_map('str_getcsv', file("data.csv"));
        array_shift($csv2);
        foreach ($csv2 as $index => $record) {
            $today = new DateTime('now');
            $year = (new DateTime("${record[0]}-01-01"))->diff($today)->y;
           echo <<< EOL
            <li>
        <h2 id="section_${record[0]}"></h2>
        <time class="mb-2 !px-4 flex">
            <div class="flex flex-row space-x-2 rounded-lg items-center">
                    <strong class="text-red-600 text-2xl">$year</strong>
                    <span class="text-base">
                    YEARS AGO
                    </span>
            </div>
        </time>
        <div class="flex !w-[83vw] md:!w-full">
            <div class="flex flex-col bg-gray-200 p-4 rounded-lg mb-2 text-center space-y-0">
                <strong>${record[0]}: ${record[1]}</strong>
                ${record[3]}
            </div>
            <div class="flex flex-row bg-white text-black rounded-lg p-4 text-center">
                <div class="basis-1/2">
                    <p class="border-b-2 border-gray-200 border-dashed pb-2 mb-2">🇵🇸 Civilians</p>
                    <p><strong>${record[5]}</strong> 🩼 Injured</p>
                    <p><strong>${record[4]}</strong> ☠ Killed</p>
                    <p><strong>${record[7]}</strong> 👶 Kids</p>
                    <p><strong>${record[6]}</strong> 👩 Women</p>
                    <p><strong>${record[8]}</strong> 🧑‍🦳 Old people</p>
                    <div class="pt-4">
                        <a class="text-blue-500 underline" href="${record[2]}">🔗 Source</a>
                    </div>
                </div>
                <div class="basis-1/2">
                    <p class="border-b-2 border-gray-200 border-dashed pb-2 mb-2">🇮🇱 Civilians</p>
                    <p><strong>${record[10]}</strong> 🩼 Injured</p>
                    <p><strong>${record[9]}</strong> ☠ Killed</p>
                    <p><strong>${record[12]}</strong> 👶 Kids</p>
                    <p><strong>${record[11]}</strong> 👩 Women</p>
                    <p><strong>${record[13]}</strong> 🧑‍🦳 Old people</p>
                    <div class="pt-4">
                        <a class="text-blue-500 underline" href="${record[2]}">🔗 Source</a>
                    </div>
                </div>
            </div>
        </div>
    </li>

EOL;

        }
    ?>
</ul>
<!-- partial -->
</body>
</html>
