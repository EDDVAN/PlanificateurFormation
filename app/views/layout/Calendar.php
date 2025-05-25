<?php $month = empty($_GET['month']) ? date('n') : $_GET['month'];
$year = empty($_GET['year']) ? date('Y') : $_GET['year'];
$nextMonth = ($month + 1 > 12) ? 1 : $month + 1;
$prevMonth = ($month - 1 == 0) ? 12 : $month - 1;

$nextYear = ($month + 1 > 12) ? $year + 1 : $year;
$prevYear = ($month - 1 == 0) ? $year - 1 : $year;
$filterString = "";
if (isset($_GET['domaine']))
    $filterString .= "&domaine=$_GET[domaine]";
if (isset($_GET['sujet']))
    $filterString .= "&sujet=$_GET[sujet]";
if (isset($_GET['cours']))
    $filterString .= "&cours=$_GET[cours]";
if (isset($_GET['formateur']))
    $filterString .= "&formateur=$_GET[formateur]";
if (isset($_GET['ville']))
    $filterString .= "&ville=$_GET[ville]";

$colors = [
    'red',
    'yellow',
    'green',
    'blue',
    'indigo',
    'purple',
    'pink',
    'rose',
    'fuchsia',
    'cyan',
]

// var_dump($data);
?>

<article class="flex flex-col md:flex-row gap-4 p-4 md:gap-8 md:p-8 ">
    <form action="<?= Session::get('path'); ?>" method="get"
        class="md:w-1/8 w-full flex flex-col pt-16 flex-row md:flex-col gap-4 ">
        <input type="hidden" name="month" value="<?= $month; ?>">
        <input type="hidden" name="year" value="<?= $year; ?>">
        <label for="domaine" class="w-full">
            <span class="text-sm font-medium text-gray-500">Domaine</span>
            <select
                id="domaine"
                name="domaine"
                class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                <option value="">Selectionnez un domaine</option>
                <?php
                foreach ($dependencies['domaine'] as $row) {
                    $selected = '';
                    if (isset($_GET['domaine'])) {
                        $selected = $_GET['domaine'] == $row->id ? 'selected' : '';
                    }
                ?>
                    <option value="<?= $row->id ?>" <?= $selected; ?>><?= $row->name ?></option>
                <?php
                } ?>
            </select>
        </label>
        <label for="sujet" class="w-full">
            <span class="text-sm font-medium text-gray-500">Sujet</span>
            <select
                id="sujet"
                name="sujet"
                class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                <?php
                foreach ($dependencies['sujet'] as $row) {
                ?>
                    <option value="<?= $row->id ?>" data-idDomaine="<?= $row->idDomaine ?>"><?= $row->name ?></option>
                <?php
                } ?>
            </select>
        </label>
        <label for="cours" class="w-full">
            <span class="text-sm font-medium text-gray-500">Cours</span>
            <select
                id="cours"
                name="cours"
                class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                <?php
                foreach ($dependencies['cours'] as $row) {
                ?>
                    <option value="<?= $row->id ?>" data-idDomaine="<?= $row->idDomaine ?>" data-idSujet="<?= $row->idSujet ?>"><?= $row->name ?></option>
                <?php
                } ?>
            </select>
        </label>
        <label for="formateur" class="w-full">
            <span class="text-sm font-medium text-gray-500">Formateur</span>
            <select
                id="formateur"
                name="formateur"
                class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                <option value="">Selectionnez un formateur</option>
                <?php
                foreach ($dependencies['formateur'] as $row) {
                    $selected = '';
                    if (isset($_GET['formateur']))
                        $selected = $_GET['formateur'] == $row->id ? 'selected' : '';
                ?>
                    <option value="<?= $row->id ?>" <?= $selected; ?>><?= $row->firstName . ' ' . $row->lastName ?></option>
                <?php
                } ?>
            </select>
        </label>
        <label for="ville" class="w-full">
            <span class="text-sm font-medium text-gray-500">Ville</span>
            <select
                id="ville"
                name="ville"
                class="mt-0.5 w-full border-gray-300 px-3 py-2 text-gray-900 shadow-sm sm:text-sm">
                <option value="">Selectionnez un ville</option>
                <?php
                foreach ($dependencies['ville'] as $row) {
                    $selected = '';
                    if (isset($_GET['ville']))
                        $selected = $_GET['ville'] == $row->id ? 'selected' : '';
                ?>
                    <option value="<?= $row->id ?>" <?= $selected; ?>><?= $row->name . ', ' . $row->pays ?></option>
                <?php
                } ?>
            </select>
        </label>
        <label class="flex flex-col justify-end align-end">
            <button type="submit" class="flex justify-center align-center gap-2 cursor-pointer  border border-emerald-600 bg-emerald-600 px-4 py-2 text-sm font-medium text-white">
                <i class="ph ph-magnifying-glass text-lg"></i>
            </button>
        </label>
        <!-- <div class="flex flex-col pb-4 border-b-1 border-gray-300">
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
        </div> -->
    </form>

    <section class="md:w-7/8 w-full grid grid-cols-7">
        <div class="col-span-2 text-lg font-bold h-12 ">
            <?= date('F', mktime(0, 0, 0, $month, 1, $year)) . ' ' . $year; ?>
        </div>
        <div class="col-span-2 p-4">
        </div>
        <div class="col-span-3 p-4 flex justify-end">
            <a href="?month=<?= $prevMonth; ?>&year=<?= $prevYear . $filterString; ?>" class="px-3 py-1 border-1 border-gray-300 rounded-l-md hover:bg-gray-50 hover:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
            </a>
            <a href="?month=<?= date('n'); ?>&year=<?= date('Y') . $filterString; ?>" class="px-3 py-1 border-b-1 border-t-1 border-gray-300 hover:bg-gray-50 hover:border-gray-600">
                today
            </a>
            <a href="?month=<?= $nextMonth; ?>&year=<?= $nextYear . $filterString; ?>" class="px-3 py-1 border-1 border-gray-300 rounded-r-md hover:bg-gray-50 hover:border-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </a>
        </div>
        <div class="border-1 hidden md:block border-gray-300 text-center font-bold order-r-0 p-4">Monday</div>
        <div class="border-1 hidden md:block border-gray-300 text-center font-bold border-r-0 p-4">Tuesday</div>
        <div class="border-1 hidden md:block border-gray-300 text-center font-bold border-r-0 p-4">Wednesday</div>
        <div class="border-1 hidden md:block border-gray-300 text-center font-bold border-r-0 p-4">Thursday</div>
        <div class="border-1 hidden md:block border-gray-300 text-center font-bold border-r-0 p-4">Friday</div>
        <div class="border-1 hidden md:block border-gray-300 text-center font-bold border-r-0 p-4">Saturday</div>
        <div class="border-1 hidden md:block border-gray-300 text-center font-bold p-4">Sunday</div>
        <div class="border-1 md:hidden block border-gray-300 text-center font-bold order-r-0 p-4">Mo</div>
        <div class="border-1 md:hidden block border-gray-300 text-center font-bold border-r-0 p-4">Tu</div>
        <div class="border-1 md:hidden block border-gray-300 text-center font-bold border-r-0 p-4">We</div>
        <div class="border-1 md:hidden block border-gray-300 text-center font-bold border-r-0 p-4">Th</div>
        <div class="border-1 md:hidden block border-gray-300 text-center font-bold border-r-0 p-4">Fr</div>
        <div class="border-1 md:hidden block border-gray-300 text-center font-bold border-r-0 p-4">Sa</div>
        <div class="border-1 md:hidden block border-gray-300 text-center font-bold p-4">Su</div>

        <?php
        $start = 1;
        $lastMonthDays = date('t', mktime(0, 0, 0, $prevMonth, 1, $prevYear));
        $days = date('t', mktime(0, 0, 0, $month, 1, $year));
        if (empty($_GET['month']))
            $today = date('j');
        else if ($_GET['month'] == date('n'))
            $today =  date('j');
        else
            $today = -100;

        $startOfTheMonth = date('w', mktime(0, 0, 0, $month, 1, $year));

        $startOfCalandar = -$startOfTheMonth + 1;
        if ($startOfTheMonth == 0)
            $i = $lastMonthDays - 6;
        else
            $i = $lastMonthDays - $startOfTheMonth  + 1;
        while (++$i <= $lastMonthDays) {
            echo '<div class="border-1 bg-gray-100 border-gray-300 p-4 h-38">' . $i . '</div>';
            $start++;
        }
        $i = 0;
        while (++$i <= $days) {
            $todayStyle = ($i == $today && $year == date('Y') && $month == date('n')) ? 'bg-emerald-500 text-white' : '';
            // echo '<div class="border-1 border-gray-300 p-4 h-38"><span class="rounded-full p-2 ' . $todayStyle . '">' . $i . '</span></div>';
        ?>
            <div class="border-1 border-gray-300 p-3 h-38">
                <div class="pb-1">
                    <span class="rounded-full p-[calc(0.4rem)] <?= $todayStyle; ?>"><?= $i ?></span>
                </div>
                <div class="flex gap-1 flex-wrap overflow-y-hidden">
                    <?php
                    foreach ($data as $row) {
                        if (strtotime("$year-$month-$i") == strtotime($row->date)) {
                            $colorId = rand(0, 9);
                    ?>
                            <span onclick="" class="rounded-xl py-1 px-2 bg-<?= $colors[$colorId] ?>-500 text-white xl:inline-block hidden" style="font-size:0.65rem"><?= $row->sujet . ' - ' . $row->cours ?></span>
                            <span class="rounded-xl py-1 px-2 bg-<?= $colors[$colorId] ?>-500 text-white xl:hidden inline-block" style="font-size:0.5rem"><?= $row->cours ?></span>
                    <?php
                        }
                    }
                    ?>
                    <!-- <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:inline-block hidden" style="font-size:0.6rem">PHP - Laravel</span>
                    <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:inline-block hidden" style="font-size:0.6rem">JIRA - ARCHIVE</span>
                    <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:inline-block hidden" style="font-size:0.6rem">PHP - PDO</span>
                    <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:inline-block hidden" style="font-size:0.6rem">PHP - PDO</span>
                    <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:inline-block hidden" style="font-size:0.6rem">JS - NODE</span>
                    <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:hidden inline-block" style="font-size:0.5rem">PHP</span>
                    <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:hidden inline-block" style="font-size:0.5rem">JIRA</span>
                    <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:hidden inline-block" style="font-size:0.5rem">PHP</span>
                    <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:hidden inline-block" style="font-size:0.5rem">PHP</span>
                    <span class="rounded-xl py-1 px-2 bg-emerald-500 text-white xl:hidden inline-block" style="font-size:0.5rem">JS</span> -->

                </div>
            </div>
        <?php
            $startOfTheMonth++;
            if ($startOfTheMonth > 6) {
                $startOfTheMonth = 0;
            }
            $start++;
        }
        $startOfTheMonth = date('w', mktime(0, 0, 0, $nextMonth, 1, $nextYear));
        $i = 0;

        while ($start % 7 != 1) {
            ++$i;
            echo '<div class="border-1 bg-gray-100 border-gray-300 p-4 h-38">' . $i . '</div>';
            $startOfTheMonth++;
            $start++;
        }
        ?>

    </section>
</article>

<script>
    $(document).ready(function() {
        const allSujetOptions = $('#sujet option').clone();
        const allCoursOptions = $('#cours option').clone();
        $('#domaine').on('change', function() {
            const selectedId = $(this).val();
            $('#sujet').empty();
            const defaultSujetOption = $('<option>', {
                value: '',
                text: 'Selectionnez un sujet',
                selected: true
            });
            let hasMatches = false;
            $('#sujet').append(defaultSujetOption);
            allSujetOptions.each(function() {
                if ($(this).data('iddomaine') == selectedId) {
                    $('#sujet').append($(this));
                    hasMatches = true;
                }
            });
            if (!hasMatches && selectedId == "") {
                allSujetOptions.each(function() {
                    $('#sujet').append($(this));
                    hasMatches = true;
                });
            } else if (!hasMatches) {
                $('#sujet').append(defaultSujetOption);
            }
            $('#sujet').val("");
            $('#sujet').trigger('change');
        });
        $('#sujet').on('change', function() {
            const selectedId = $(this).val();
            const selectedDomaineId = $('#domaine').val();
            if (selectedDomaineId == "" && selectedId != "") {
                $('#domaine').val($('option:selected', this).data('iddomaine'));
                $('#domaine').trigger('change');
                $('#sujet').val(selectedId);
                return;
            }
            $('#cours').empty();
            const defaultOption = $('<option>', {
                value: '',
                text: 'Selectionnez un cours',
                selected: true
            });
            let hasMatches = false;
            $('#cours').append(defaultOption);
            allCoursOptions.each(function() {
                if ((selectedId == "" && $(this).data('iddomaine') == selectedDomaineId) || $(this).data('idsujet') == selectedId) {
                    $('#cours').append($(this));
                    hasMatches = true;
                }
            });
            if (!hasMatches && selectedId == "" && selectedDomaineId == "") {
                allCoursOptions.each(function() {
                    $('#cours').append($(this));
                    hasMatches = true;
                });
            } else if (!hasMatches) {
                $('#cours').append(defaultOption);
            }
        });

        $('#cours').on('change', function() {
            const selectedId = $(this).val();
            const selectedDomaineId = $('#domaine').val();
            const selectedSujetId = $('#sujet').val();
            if (selectedDomaineId == "" && selectedSujetId == "" && selectedId != "") {
                $('#domaine').val($('option:selected', this).data('iddomaine'));
                $('#domaine').trigger('change');
                $('#sujet').val($('option:selected', this).data('idsujet'));
                $('#sujet').trigger('change');
                $('#cours').val(selectedId);
                return;
            }

        });
        $('#domaine').trigger('change');

        <?php
        if (isset($_GET['sujet'])) {
            echo '$("#sujet").val(' . $_GET['sujet'] . ');';
        }
        if (isset($_GET['cours'])) {
            echo '$("#cours").val(' . $_GET['cours'] . ');';
        }
        ?>
    });
</script>