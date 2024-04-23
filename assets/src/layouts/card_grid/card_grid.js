import './card_grid.scss'

window.addEventListener('load', function () {
    const cardGroups = document.querySelectorAll('.card-grid .card-container/*:not(.full-width-card-container)*/:not(.search-card-container)')

    function syncHeights (card, maxHeightHeader, maxHeightBody) {
        let header = card.querySelector('.card-heading')
        let body = card.querySelector('.card-body')

        if (header) {
            let headerHeight = header.offsetHeight
            if (headerHeight > maxHeightHeader.value) {
                maxHeightHeader.value = headerHeight
            }
        }

        if (body) {
            let bodyHeight = body.offsetHeight
            if (bodyHeight > maxHeightBody.value) {
                maxHeightBody.value = bodyHeight
            }
        }
    }

    function doSyncHeights (cardGroups) {
        cardGroups.forEach(function (cardGroup) {
            let maxHeightHeader = { value: 0 }
            let maxHeightBody = { value: 0 }

            let cards = cardGroup.querySelectorAll('.card')

            cards.forEach(function (card) {
                syncHeights(card, maxHeightHeader, maxHeightBody)
            })

            // Set CSS variables on the cardGroup container
            cardGroup.style.setProperty('--card-height-header', maxHeightHeader.value + 'px')
            cardGroup.style.setProperty('--card-height-body', maxHeightBody.value + 'px')
        })
    }

    doSyncHeights(cardGroups)

    // Then use these CSS variables in your stylesheet like this:
    // .accordion-label { height: var(--max-header-height) }
    // .content { height: var(--max-content-height) }
})
