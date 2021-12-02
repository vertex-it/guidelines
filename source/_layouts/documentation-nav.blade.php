<nav class="ml-6" id="documentation-nav">
    <p class="mb-5 mt-0 uppercase text-xs font-light tracking-wide text-gray-600">On this page</p>
</nav>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
<script>
    let parent = $('.DocSearch-content');

    let ids = []
    parent.children().each((index, elem) => {
        if ($(elem).attr('id')) {
            ids.push({
                url: $(elem).attr('id'),
                text: $(elem).text(),
                tag: $(elem).prop("tagName").toLowerCase()
            })
        }
    })

    $(ids).each((index, elem) => {
        let additionalStyles = ''
        if (elem.tag === 'h3') {
            additionalStyles = 'display: list-item; list-style-type: disc; list-style-position: inside;'
        }

        $('#documentation-nav').append('<div class="mb-2"><a class="text-gray-900 hover:text-red-600 text-sm font-normal" href="#' + elem.url + '" style="' + additionalStyles + '">' + elem.text + '</a></div>')
    })
</script>
