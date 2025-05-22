<?php $month = empty($_GET['month']) ? date('n') : $_GET['month'];
?>

<article class="flex flex-col md:flex-row gap-4 p-4 md:gap-8 md:p-8 ">
    <section class="w-1/8 flex pt-16 flex-col gap-4 ">
        <div class="flex flex-col pb-4 border-b-1 border-gray-300">
            <span class="text-sm font-bold">Formation IT, JEE</span>
            <span class="text-xs text-gray-500">Rabat, Maroc - 10AM asd a sd a das</span>
        </div>
        <div class="flex flex-col pb-4 border-b-1 border-gray-300">
            <span class="text-sm font-bold">Formation IT, JEE</span>
            <span class="text-xs text-gray-500">Rabat, Maroc - 10AM asd a sd a das</span>
        </div>
        <div class="flex flex-col pb-4 border-b-1 border-gray-300">
            <span class="text-sm font-bold">Formation IT, JEE</span>
            <span class="text-xs text-gray-500">Rabat, Maroc - 10AM asd a sd a das</span>
        </div>
        <div class="flex flex-col pb-4 border-b-1 border-gray-300">
            <span class="text-sm font-bold">Formation IT, JEE</span>
            <span class="text-xs text-gray-500">Rabat, Maroc - 10AM asd a sd a das</span>
        </div>
    </section>
    <section class="w-7/8 grid grid-cols-7">
        <div class="col-span-1 text-lg font-bold h-12 ">
            <?= date('F', mktime(0, 0, 0, $month, 1, date('Y'))) . ' ' . date('Y'); ?>
        </div>
        <div class="col-span-5 p-4">
        </div>
        <div class="col-span-1 p-4 flex justify-end">
            <a href="?month=<?= $month - 1; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
            <a href="?month=<?= $month + 1; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>

        </div>
        <div class="border-1 border-gray-300 text-center font-bold order-r-0 p-4">Monday</div>
        <div class="border-1 border-gray-300 text-center font-bold border-r-0 p-4">Tuesday</div>
        <div class="border-1 border-gray-300 text-center font-bold border-r-0 p-4">Wednesday</div>
        <div class="border-1 border-gray-300 text-center font-bold border-r-0 p-4">Thursday</div>
        <div class="border-1 border-gray-300 text-center font-bold border-r-0 p-4">Friday</div>
        <div class="border-1 border-gray-300 text-center font-bold border-r-0 p-4">Saturday</div>
        <div class="border-1 border-gray-300 text-center font-bold p-4">Sunday</div>

        <?php
        $start = 1;
        $lastMonthDays = date('t', mktime(0, 0, 0, $month - 1, 1, date('Y')));
        $days = date('t', mktime(0, 0, 0, $month, 1, date('Y')));
        if (empty($_GET['month']))
            $today = date('j');
        else if ($_GET['month'] == date('n'))
            $today =  date('j');
        else
            $today = -100;

        $startOfTheMonth = date('w', mktime(0, 0, 0, $month, 1, date('Y')));

        $startOfCalandar = -$startOfTheMonth + 1;
        $i = $lastMonthDays - $startOfTheMonth  + 1;
        while (++$i <= $lastMonthDays) {
            echo '<div class="border-1 bg-gray-100 border-gray-300 p-4 h-32">' . $i . '</div>';
            $start++;
        }
        $i = 0;
        while (++$i <= $days) {
            $todayStyle = $i == $today ? 'bg-emerald-500 text-white' : '';
            echo '<div class="border-1 border-gray-300 p-4 h-32"><span class="rounded-full p-2 ' . $todayStyle . '">' . $i . '</span></div>';
            $startOfTheMonth++;
            if ($startOfTheMonth > 6) {
                $startOfTheMonth = 0;
            }
            $start++;
        }
        $startOfTheMonth = date('w', mktime(0, 0, 0, $month + 1, 1, date('Y')));
        $i = 0;

        while ($start % 7 != 1) {
            ++$i;
            echo '<div class="border-1 bg-gray-100 border-gray-300 p-4 h-32">' . $i . '</div>';
            $startOfTheMonth++;
            $start++;
        }
        ?>

    </section>
</article>