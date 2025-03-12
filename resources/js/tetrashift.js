let gamesPlayed = localStorage.getItem('gamesPlayed') || 0;
let winStreak = localStorage.getItem('winStreak') || 0;
let rowAchievements = JSON.parse(localStorage.getItem('rowAchievements')) || {
    8: 0,
    7: 0,
    6: 0,
    5: 0,
    4: 0,
    3: 0,
    2: 0,
    1: 0,
    0: 0
};

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('instructions-modal');
    const startButton = document.getElementById('start-button');

    // Show the modal
    const puzzleContainer = document.getElementById('puzzle-container');
    const rowsContainer = document.getElementById('rows-container');
    const timerContainer = document.getElementById('timer');
    const scoreContainer = document.getElementById('score');
    const colors = ['bg-rose-500', 'bg-green-500', 'bg-blue-500', 'bg-yellow-300', 'bg-orange-500', 'bg-fuchsia-500'];
    let puzzle = [];
    let rowsToSolve = [];
    const gridSize = 5;
    const cellSize = 50; // Size of each cell in pixels
    const maxRows = 8;
    let score = 0;
    let timer;
    let timeRemaining = 60; // 1 minute in seconds




    startButton.addEventListener('click', () => {
        modal.style.display = 'none';
        startGame();
    });

    function startGame() {
        puzzle = createPuzzle();
        rowsToSolve = [];

        // Pre-select 8 rows to solve
        for (let i = 0; i < maxRows; i++) {
            rowsToSolve.push(generateFallingColors());
        }

        renderPuzzle(puzzle, puzzleContainer);
        updateRowsContainer();
        startTimer();
    }
    puzzleContainer.addEventListener('click', (e) => {
        if (e.target.className.includes('puzzle-piece')) {
            const piece = e.target;
            const index = Array.from(puzzleContainer.children).indexOf(piece);
            const emptyIndex = puzzle.indexOf(0);
            if (canMove(index, emptyIndex)) {
                moveTiles(index, emptyIndex);
                renderPuzzle(puzzle, puzzleContainer);
                checkForMatch(); // Check if any row matches the current row to solve
            }
        }
    });

    document.addEventListener('keydown', (e) => {
        const emptyIndex = puzzle.indexOf(0);
        let targetIndex = -1;

        switch (e.key) {
            case 'ArrowUp':
                targetIndex = emptyIndex + gridSize;
                break;
            case 'ArrowDown':
                targetIndex = emptyIndex - gridSize;
                break;
            case 'ArrowLeft':
                targetIndex = emptyIndex + 1;
                break;
            case 'ArrowRight':
                targetIndex = emptyIndex - 1;
                break;
        }

        if (targetIndex >= 0 && targetIndex < gridSize * gridSize && canMove(targetIndex, emptyIndex)) {
            moveTiles(targetIndex, emptyIndex);
            renderPuzzle(puzzle, puzzleContainer);
            checkForMatch(); // Check if any row matches the current row to solve
        }
    });

    function startTimer() {
        timer = setInterval(() => {
            timeRemaining--;
            timerContainer.innerHTML = `Time Remaining: ${timeRemaining}s`;
            if (timeRemaining <= 0) {
                clearInterval(timer);
                endGame();
            }
        }, 1000); // Update timer every second
    }

    function updateRowsContainer() {
        rowsContainer.innerHTML = ''; // Clear the container

        if (rowsToSolve.length > 0) {
            const rowColors = rowsToSolve[0];
            const row = document.createElement('div');
            row.className = 'row-to-solve';
            row.style.display = 'grid';
            row.style.gridTemplateColumns = `repeat(3, ${cellSize}px)`;
            row.style.gap = '2px';
            rowColors.forEach(color => {
                const piece = document.createElement('div');
                piece.className = 'puzzle-piece';
                piece.classList.add(color);
                row.appendChild(piece);
            });
            rowsContainer.appendChild(row);
        }
    }

    function checkForMatch() {
        if (rowsToSolve.length > 0) {
            const targetRow = rowsToSolve[0];
            for (let row = 0; row < gridSize; row++) {
                for (let col = 0; col <= gridSize - 3; col++) {
                    let match = true;
                    for (let i = 0; i < 3; i++) {
                        if (puzzle[row * gridSize + col + i] !== targetRow[i]) {
                            match = false;
                            break;
                        }
                    }
                    if (match) {
                        highlightMatch([row * gridSize + col, row * gridSize + col + 1, row * gridSize + col + 2]);
                        setTimeout(() => {
                            rowsToSolve.shift(); // Remove the solved row
                            score++;
                            scoreContainer.innerHTML = `${score}`;
                            updateRowsContainer();
                            if (rowsToSolve.length === 0) {
                                clearInterval(timer);
                                endGame();
                            }
                        }, 500); // Adjust delay as needed
                        return;
                    }
                }
            }

            
        }
    }
    function highlightMatch(indices) {
        indices.forEach(index => {
            const piece = puzzleContainer.children[index];
            piece.style.setProperty('--original-color', piece.style.backgroundColor);
            piece.classList.add('highlight');
        });
        setTimeout(() => {
            indices.forEach(index => {
                const piece = puzzleContainer.children[index];
                piece.classList.remove('highlight');
            });
        }, 500); // Highlight duration (0.5s animation * 2 iterations)
    }

    function createPuzzle() {    
        let puzzle = colors.flatMap(color => Array(4).fill(color));
        puzzle.push(0); // 0 represents the empty space
        return shuffle(puzzle);
    }

    function renderPuzzle(puzzle, container) {
        container.innerHTML = '';
        puzzle.forEach(num => {
            const piece = document.createElement('div');
            piece.className = num === 0 ? 'puzzle-piece empty' : 'puzzle-piece';
            piece.classList.add(num === 0 ? 'bg-white' : num)
            container.appendChild(piece);
        });
    }

    function generateFallingColors() {
        let fallingColors = [];

        while (fallingColors.length < 3) {
            let color = colors[Math.floor(Math.random() * colors.length)];
            fallingColors.push(color);
        }

        return fallingColors;
    }

    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    function canMove(index, emptyIndex) {
        const size = 5;
        const row = Math.floor(index / size);
        const col = index % size;
        const emptyRow = Math.floor(emptyIndex / size);
        const emptyCol = emptyIndex % size;

        return (row === emptyRow || col === emptyCol); // Same row or same column
    }

    function moveTiles(index, emptyIndex) {
        const size = 5;
        const row = Math.floor(index / size);
        const col = index % size;
        const emptyRow = Math.floor(emptyIndex / size);
        const emptyCol = emptyIndex % size;

        if (row === emptyRow) { // Same row
            if (col < emptyCol) { // Move right
                for (let i = emptyCol; i > col; i--) {
                    puzzle[emptyRow * size + i] = puzzle[emptyRow * size + i - 1];
                }
            } else { // Move left
                for (let i = emptyCol; i < col; i++) {
                    puzzle[emptyRow * size + i] = puzzle[emptyRow * size + i + 1];
                }
            }
            puzzle[emptyRow * size + col] = 0;
        } else if (col === emptyCol) { // Same column
            if (row < emptyRow) { // Move down
                for (let i = emptyRow; i > row; i--) {
                    puzzle[i * size + emptyCol] = puzzle[(i - 1) * size + emptyCol];
                }
            } else { // Move up
                for (let i = emptyRow; i < row; i++) {
                    puzzle[i * size + emptyCol] = puzzle[(i + 1) * size + emptyCol];
                }
            }
            puzzle[row * size + emptyCol] = 0;
        }
    }
    function endGame() {
        

        // Update games played
        gamesPlayed++;
        localStorage.setItem('gamesPlayed', gamesPlayed);

        // Update win streak and row achievements
        if (score === maxRows) {
            winStreak++;
        } else {
            winStreak = 0; // Reset streak if you don't clear all rows
        }
        localStorage.setItem('winStreak', winStreak);

        // Update row achievements
        if (score in rowAchievements) {
            rowAchievements[score]++;
        }
        localStorage.setItem('rowAchievements', JSON.stringify(rowAchievements));

        // Display the statistics
        displayStatistics();
    }
    function displayStatistics() {
        document.getElementById('games-played').innerText = `Games Played: ${gamesPlayed}`;
        document.getElementById('win-streak').innerText = `Win Streak: ${winStreak}`;

        const achievementsList = document.getElementById('row-achievements');
        achievementsList.innerHTML = ''; // Clear existing list

        Object.keys(rowAchievements).forEach(row => {
            const li = document.createElement('li');


            li.innerHTML = `${row} rows: <progress value="${rowAchievements[row]}" max="${gamesPlayed}">${rowAchievements[row]}</progress>`;
            achievementsList.appendChild(li);
        });
        document.getElementById('results-modal').classList.remove('hidden');
    }
});