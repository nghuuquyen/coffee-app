/**
 * Active Light Theme
 */
function activeLightTheme() {
    document.documentElement.classList.remove('theme-dark')
    document.documentElement.classList.add('theme-light')

    document.body.classList.remove('bg-background');
    document.body.classList.add('bg-gradient-to-r', 'from-rose-100', 'to-teal-100')
}

/**
 * Active Dark Theme
 */
function activeDarkTheme() {
    document.documentElement.classList.remove('theme-light')
    document.documentElement.classList.add('theme-dark')

    document.body.classList.remove('bg-gradient-to-r', 'from-rose-100', 'to-teal-100')
    document.body.classList.add('bg-background')
}

/**
 * Handle active theme
 *
 * @param {string} targetTheme
 */
function setTheme(targetTheme) {
    switch(targetTheme) {
        case 'theme-dark': {
            activeDarkTheme()
            break
        }

        case 'theme-light': {
            activeLightTheme()
            break
        }

        case 'auto': {
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                activeDarkTheme()
            } else {
                activeLightTheme()
            }

            break
        }
    }
}

/**
 * Setup browser event listener event when theme was changed
 */
function setupThemeChangeEventListener()
{
    Livewire.on('theme-changed', (data) => {
        setTheme(data.theme)
    })
}

// theme variable was passing from session via script tag in base layout file
setTheme(window.theme || 'auto')

setupThemeChangeEventListener()