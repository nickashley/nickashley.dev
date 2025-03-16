document.addEventListener('alpine:init', () => {
    Alpine.store('game', {
        currentAttempt: 0,
        guesses: 100,
        currentGuess: [],
        nextLetter: 0,
        points: 0,
        answer: WORDS[Math.floor(Math.random() * WORDS.length)],
        decrement() {
            if(this.guesses > this.currentAttempt){
                this.guesses--;
            }
            else{
                toastr.error("You've run out of guesses! Game over!")
                toastr.info(`The right word was: "${this.answer}"`)
                clearInterval(gameLoop);
            }
        },
        insertLetter(pressedKey) {
            if (this.nextLetter === 5) {
                return
            }
            pressedKey = pressedKey.toLowerCase()

            let row = document.getElementsByClassName("letter-row")[this.currentAttempt]
            let box = row.children[this.nextLetter]
            animateCSS(box, "pulse")
            box.textContent = pressedKey
            box.classList.add("filled-box")
            this.currentGuess.push(pressedKey)
            this.nextLetter += 1
        },
        deleteLetter () {
            let row = document.getElementsByClassName("letter-row")[this.currentAttempt]
            let box = row.children[this.nextLetter - 1]
            box.textContent = ""
            box.classList.remove("filled-box")
            this.currentGuess.pop()
            this.nextLetter -= 1
        },
        checkGuess () {
            let row = document.getElementsByClassName("letter-row")[this.currentAttempt]
            let guessString = ''
            let rightGuess = Array.from(this.answer)

            for (const val of this.currentGuess) {
                guessString += val
            }

            if (guessString.length != 5) {
                return
            }

            if (!GUESSES.includes(guessString) && !WORDS.includes(guessString)) {
                toastr.error("Word not in list!")
                return
            }

            if (guessString === this.answer) {
                for (let i = 0; i < 5; i++) {
                    let box = row.children[i]
                    box.classList.add('bg-emerald-400')
                }
                //document.getElementsByClassName("letter-row")[this.currentAttempt].scrollIntoView();
                for(let i=0; i< this.currentAttempt; i++){
                    document.getElementsByClassName("letter-row")[i].classList.add('hidden');
                }
                this.points++;
                for (const elem of document.getElementsByClassName("keyboard-button")) {
                    elem.classList.remove('bg-emerald-400', 'bg-gray-400', 'bg-orange-300')
                }
                this.currentAttempt++;
                this.currentGuess = [];
                this.nextLetter = 0;
                this.answer = WORDS[Math.floor(Math.random() * WORDS.length)]
                console.log(this.answer)

                for (var i = 0; i < guessString.length; i++) {
                    this.insertLetter(guessString.charAt(i))
                }
                this.guesses+=10;
                this.checkGuess()
                return
            }
            else
            {
                //color greens first
                for (let i = 0; i < 5; i++) {
                    let letterColor = ''
                    let box = row.children[i]
                    let letter = this.currentGuess[i]

                    if(rightGuess[i] == this.currentGuess[i]){
                        //shade green
                        rightGuess[i] = "#"
                        this.currentGuess[i] = "#"

                        let delay = 250 * i
                        setTimeout(()=> {
                            //shade box
                            box.classList.add('bg-emerald-400')
                            shadeKeyBoard(letter, 'green')
                        }, delay)
                    }

                }
                //color grays next
                for (let i = 0; i < 5; i++) {
                    let letterColor = ''
                    let box = row.children[i]
                    let letter = this.currentGuess[i]

                    let letterPosition = rightGuess.indexOf(this.currentGuess[i])
                    if (letterPosition === -1) {
                        let delay = 250 * i
                        setTimeout(()=> {
                            //shade box
                            box.classList.add('bg-gray-400')
                            shadeKeyBoard(letter, 'gray')
                        }, delay)
                    }
                }
                //color yellows
                for (let i = 0; i < 5; i++) {
                    let letterColor = ''
                    let box = row.children[i]
                    let letter = this.currentGuess[i]
                    if(letter == '#'){
                        continue;
                    }

                    let letterPosition = rightGuess.indexOf(this.currentGuess[i])
                    // is letter in the correct guess
                    if (letterPosition === -1) {
                        letterColor = 'gray'
                    }
                    else {
                        letterColor = 'yellow'
                        rightGuess[letterPosition] = "#"
                    }

                    let delay = 250 * i
                    setTimeout(()=> {
                        //shade box
                        if(letterColor == 'gray'){
                            box.classList.add('bg-gray-400');
                        }
                        if(letterColor == 'yellow'){
                            box.classList.add('bg-orange-300');
                        }
                        shadeKeyBoard(letter, letterColor)
                    }, delay)
                }

                this.currentAttempt++;
                this.currentGuess = [];
                this.nextLetter = 0;

                if (this.currentAttempt > this.guesses) {
                    toastr.error("You've run out of guesses! Game over!")
                    toastr.info(`The right word was: "${this.answer}"`)
                }
            }
        }
    })

})
let gameLoop = setInterval(()=>{ Alpine.store('game').decrement()}, 3000);


document.addEventListener("keyup", (e) => {
    if (Alpine.store('game').guesses < Alpine.store('game').currentAttempt) {
        return
    }

    let pressedKey = String(e.key)
    if (pressedKey === "Backspace" && Alpine.store('game').nextLetter !== 0) {
        Alpine.store('game').deleteLetter();
        return
    }

    if (pressedKey === "Enter") {
        Alpine.store('game').checkGuess();
        return
    }

    let found = pressedKey.match(/[a-z]/gi)
    if (!found || found.length > 1) {
        return
    } else {
        Alpine.store('game').insertLetter(pressedKey);
    }
})





function shadeKeyBoard(letter, color) {
    for (const elem of document.getElementsByClassName("keyboard-button")) {
        if (elem.textContent === letter) {
            if(elem.classList.contains('bg-emerald-400')){
                return
            }

            if(elem.classList.contains('bg-orange-300') && color!=='green'){
                return
            }

            switch(color){
                case 'green':
                    elem.classList.add('bg-emerald-400');
                    break;
                case 'gray':
                    elem.classList.add('bg-gray-400');
                    break;
                case 'yellow':
                    elem.classList.add('bg-orange-300');
                    break;

            }
            break
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