import { WORDS } from "./words.js";
import { GUESSES } from "./guesses.js";

const NUMBER_OF_GUESSES = 20;

let guessesRemaining = NUMBER_OF_GUESSES;
document.getElementsByClassName('guesses')[0].innerText = 'Guesses: ' + guessesRemaining;
let currentGuess = [];
let nextLetter = 0;
let rightGuessString = '';
let points = 0;

function initBoard() {
    currentGuess = [];
    nextLetter = 0;
    rightGuessString = WORDS[Math.floor(Math.random() * WORDS.length)]
    console.log(rightGuessString)
    let board = document.getElementById("game-board");
    board.innerHTML = '';

    for (let i = 0; i < NUMBER_OF_GUESSES; i++) {
        let row = document.createElement("div")
        row.className = "letter-row flex justify-center"

        for (let j = 0; j < 5; j++) {
            let box = document.createElement("div")
            box.className = "letter-box p-2 m-1 border-2 rounded border-gray-400 h-16 w-16 flex items-center justify-center uppercase text-xl font-semibold"
            row.appendChild(box)
        }

        board.appendChild(row)
    }
    for (const elem of document.getElementsByClassName("keyboard-button")) {
            elem.style.backgroundColor = '#d4d4d8';
    }
}

initBoard()

document.addEventListener("keyup", (e) => {

    if (guessesRemaining === 0) {
        return
    }

    let pressedKey = String(e.key)
    if (pressedKey === "Backspace" && nextLetter !== 0) {
        deleteLetter()
        return
    }

    if (pressedKey === "Enter") {
        checkGuess()
        return
    }

    let found = pressedKey.match(/[a-z]/gi)
    if (!found || found.length > 1) {
        return
    } else {
        insertLetter(pressedKey)
    }
})

function insertLetter (pressedKey) {
    if (nextLetter === 5) {
        return
    }
    pressedKey = pressedKey.toLowerCase()

    let row = document.getElementsByClassName("letter-row")[NUMBER_OF_GUESSES - guessesRemaining]
    let box = row.children[nextLetter]
    animateCSS(box, "pulse")
    box.textContent = pressedKey
    box.classList.add("filled-box")
    currentGuess.push(pressedKey)
    nextLetter += 1
}

function deleteLetter () {
    let row = document.getElementsByClassName("letter-row")[NUMBER_OF_GUESSES - guessesRemaining]
    let box = row.children[nextLetter - 1]
    box.textContent = ""
    box.classList.remove("filled-box")
    currentGuess.pop()
    nextLetter -= 1
}

function shadeKeyBoard(letter, color) {
    for (const elem of document.getElementsByClassName("keyboard-button")) {
        if (elem.textContent === letter) {
            let oldColor = elem.style.backgroundColor
            if (oldColor === '#34D399') {
                return
            }

            if (oldColor === '#FBBF24' && color !== '#34D399') {
                return
            }

            elem.style.backgroundColor = color
            break
        }
    }
}

function checkGuess () {
    let row = document.getElementsByClassName("letter-row")[NUMBER_OF_GUESSES - guessesRemaining]
    let guessString = ''
    let rightGuess = Array.from(rightGuessString)

    for (const val of currentGuess) {
        guessString += val
    }

    if (guessString.length != 5) {
        return
    }

    if (!GUESSES.includes(guessString) && !WORDS.includes(guessString)) {
        toastr.error("Word not in list!")
        return
    }


    //color greens first
    for (let i = 0; i < 5; i++) {
        let letterColor = ''
        let box = row.children[i]
        let letter = currentGuess[i]

        if(rightGuess[i] == currentGuess[i]){
            //shade green
            letterColor = '#34D399'
            rightGuess[i] = "#"
            currentGuess[i] = "#"

            let delay = 250 * i
            setTimeout(()=> {
                //shade box
                box.style.backgroundColor = letterColor
                shadeKeyBoard(letter, letterColor)
            }, delay)
        }

    }
    //color grays next
    for (let i = 0; i < 5; i++) {
        let letterColor = ''
        let box = row.children[i]
        let letter = currentGuess[i]

        let letterPosition = rightGuess.indexOf(currentGuess[i])
        if (letterPosition === -1) {
            letterColor = '#A1A1AA'

            let delay = 250 * i
            setTimeout(()=> {
                //shade box
                box.style.backgroundColor = letterColor
                shadeKeyBoard(letter, letterColor)
            }, delay)
        }
    }

    //color yellows
    for (let i = 0; i < 5; i++) {
        let letterColor = ''
        let box = row.children[i]
        let letter = currentGuess[i]
        if(letter == '#'){
            continue;
        }

        let letterPosition = rightGuess.indexOf(currentGuess[i])
        // is letter in the correct guess
        if (letterPosition === -1) {
            letterColor = '#A1A1AA'
        } else {
            // now, letter is definitely in word
            // if letter index and right guess index are the same
            // letter is in the right position
            if (currentGuess[i] === rightGuess[i]) {
                // shade green
                letterColor = '#34D399'
            } else {
                // shade box yellow
                letterColor = '#FBBF24'
            }

            rightGuess[letterPosition] = "#"
        }

        let delay = 250 * i
        setTimeout(()=> {
            //shade box
            box.style.backgroundColor = letterColor
            shadeKeyBoard(letter, letterColor)
        }, delay)
    }


    if (guessString === rightGuessString) {
        points++;
        document.getElementsByClassName('score')[0].innerText = 'Score: ' + points;
        for (const elem of document.getElementsByClassName("keyboard-button")) {
            elem.style.backgroundColor = '#d4d4d8';
        }
        guessesRemaining -= 1;
        document.getElementsByClassName('guesses')[0].innerText = 'Guesses: ' + guessesRemaining;
        currentGuess = [];
        nextLetter = 0;
        rightGuessString = WORDS[Math.floor(Math.random() * WORDS.length)]
        console.log(rightGuessString)

        for (var i = 0; i < guessString.length; i++) {
            insertLetter(guessString.charAt(i))
        }
        checkGuess()
        return
    } else {
        guessesRemaining -= 1;
        document.getElementsByClassName('guesses')[0].innerText = 'Guesses: ' + guessesRemaining;
        currentGuess = [];
        nextLetter = 0;

        if (guessesRemaining === 0) {
            toastr.error("You've run out of guesses! Game over!")
            toastr.info(`The right word was: "${rightGuessString}"`)
        }
    }
}

document.getElementById("keyboard-cont").addEventListener("click", (e) => {

    const target = e.target

    if (!target.classList.contains("keyboard-button")) {
        return
    }

    let key = target.textContent

    if(target.classList.contains('delete_button')){
        key = "Backspace"
    }

    document.dispatchEvent(new KeyboardEvent("keyup", {'key': key}))
})


const animateCSS = (element, animation, prefix = 'animate__') =>
    // We create a Promise and return it
    new Promise((resolve, reject) => {
        const animationName = `${prefix}${animation}`;
        // const node = document.querySelector(element);
        const node = element
        node.style.setProperty('--animate-duration', '0.3s');

        node.classList.add(`${prefix}animated`, animationName);

        // When the animation ends, we clean the classes and resolve the Promise
        function handleAnimationEnd(event) {
            event.stopPropagation();
            node.classList.remove(`${prefix}animated`, animationName);
            resolve('Animation ended');
        }

        node.addEventListener('animationend', handleAnimationEnd, {once: true});
    });
