require('./bootstrap');

$('#table').excelTableFilter({
    // columnSelector: ".table-column",    // (optional) if present, will only select <th> with specified class
    sort: true,                         // (optional) default true
    search: true,                        // (optional) default true
    captions: {a_to_z: 'По возрастанию', z_to_a: 'По убыванию', search: 'Поиск', select_all: 'Выбрать все'}                    // (optional) default { a_to_z: 'A to Z', z_to_a: 'Z to A', search: 'Search', select_all: 'Select All' }
});
