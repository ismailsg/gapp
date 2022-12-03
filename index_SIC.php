<!DOCTYPE html>
<html>
    <head> 
	
        <title>Bienvenue - <?php echo $_SESSION['user_session']; ?></title>
		
		<style>
		body {
  padding: 3em;
}

.construction:after {
  background-color: #fdd400; /* colour of the sign */
  border-radius: 3em;
  content: '';
  height: 28em;
  left: -12em;
  position: absolute;
  top: 5em;
  transform: rotate(45deg);
  width: 28em;
  z-index: -1;
}
.construction {
  animation: work .375s steps(1, start) infinite;
  font-size: 7px; /* pixel size */
  height: 1em;
  margin-bottom: 37em;
  margin-left: 17em;
  position: relative;
  width: 1em;
  
  /* Remove this is you don't care about a fallback image */
  
  box-shadow:
    /* row 1 */
    inset 0 0 0 1em,
    1em   0,
    2em   0,
    3em   0,
    /* row 2 */
    -1em  1em,
    0     1em,
    1em   1em,
    2em   1em,
    3em   1em,
    4em   1em,
    /* row 3 */
    -2em  2em,
    -1em  2em,
    4em   2em,
    5em   2em,
    /* row 4 */
    -3em  3em,
    -2em  3em,
    5em   3em,
    6em   3em,
    /* row 5 */
    -4em  4em,
    -3em  4em,
    6em   4em,
    7em   4em,
    /* row 6 */
    -5em  5em,
    -4em  5em,
    7em   5em,
    8em   5em,
    /* row 7 */
    -6em  6em,
    -5em  6em,
    8em   6em,
    9em   6em,
    /* row 8 */
    -7em  7em,
    -6em  7em,
    0     7em,
    1em   7em,
    2em   7em,
    3em   7em,
    9em   7em,
    10em  7em,
    /* row 9 */
    -8em  8em,
    -7em  8em,
    -1em  8em,
    0     8em,
    1em   8em,
    2em   8em,
    3em   8em,
    4em   8em,
    10em  8em,
    11em  8em,
    /* row 10 */
    -9em  9em,
    -8em  9em,
    -1em  9em,
    0     9em,
    1em   9em,
    2em   9em,
    3em   9em,
    4em   9em,
    11em  9em,
    12em  9em,
    /* row 11 */
    -10em 10em,
    -9em  10em,
    -1em  10em,
    0     10em,
    1em   10em,
    2em   10em,
    3em   10em,
    4em   10em,
    12em  10em,
    13em  10em,
    /* row 12 */
    -11em 11em,
    -10em 11em,
    -1em  11em,
    0     11em,
    1em   11em,
    2em   11em,
    3em   11em,
    4em   11em,
    13em  11em,
    14em  11em,
    /* row 13 */
    -12em 12em,
    -11em 12em,
    -8em  12em,
    -7em  12em,
    -6em  12em,
    -5em  12em,
    -4em  12em,
    -3em  12em,
    -2em  12em,
    0     12em,
    1em   12em,
    2em   12em,
    3em   12em,
    14em  12em,
    15em  12em,
    /* row 14 */
    -13em 13em,
    -12em 13em,
    -8em  13em,
    -4em  13em,
    -3em  13em,
    -2em  13em,
    -1em  13em,
    15em  13em,
    16em  13em,
    /* row 15 */
    -14em 14em,
    -13em 14em,
    -7em  14em,
    -5em  14em,
    -4em  14em,
    -3em  14em,
    -2em  14em,
    -1em  14em,
    0     14em,
    16em  14em,
    17em  14em,
    /* row 16 */
    -15em 15em,
    -14em 15em,
    -7em  15em,
    -6em  15em,
    -5em  15em,
    -4em  15em,
    -3em  15em,
    -2em  15em,
    0     15em,
    17em  15em,
    18em  15em,
    /* row 17 */
    -16em 16em,
    -15em 16em,
    -7em  16em,
    -6em  16em,
    -5em  16em,
    -4em  16em,
    -3em  16em,
    0     16em,
    18em  16em,
    19em  16em,
    /* row 18 */
    -17em 17em,
    -16em 17em,
    -8em  17em,
    -7em  17em,
    -6em  17em,
    -5em  17em,
    -4em  17em,
    -3em  17em,
    0     17em,
    19em  17em,
    20em  17em,
    /* row 19 */
    -17em 18em,
    -16em 18em,
    -8em  18em,
    -7em  18em,
    -6em  18em,
    -5em  18em,
    -4em  18em,
    -2em  18em,
    0     18em,
    19em  18em,
    20em  18em,
    /* row 20 */
    -17em 19em,
    -16em 19em,
    -8em  19em,
    -7em  19em,
    -6em  19em,
    -5em  19em,
    -4em  19em,
    -1em  19em,
    0     19em,
    19em  19em,
    20em  19em,
    /* row 21 */
    -17em 20em,
    -16em 20em,
    -8em  20em,
    -7em  20em,
    -6em  20em,
    -5em  20em,
    -4em  20em,
    -3em  20em,
    0     20em,
    19em  20em,
    20em  20em,
    /* row 22 */
    -16em 21em,
    -15em 21em,
    -8em  21em,
    -7em  21em,
    -6em  21em,
    -5em  21em,
    -4em  21em,
    -3em  21em,
    -2em  21em,
    1em   21em,
    18em  21em,
    19em  21em,
    /* row 23 */
    -15em 22em,
    -14em 22em,
    -8em  22em,
    -7em  22em,
    -6em  22em,
    -4em  22em,
    -3em  22em,
    -2em  22em,
    -1em  22em,
    2em   22em,
    17em  22em,
    18em  22em,
    /* row 24 */
    -14em 23em,
    -13em 23em,
    -8em  23em,
    -7em  23em,
    -6em  23em,
    -3em  23em,
    -2em  23em,
    -1em  23em,
    3em   23em,
    16em  23em,
    17em  23em,
    /* row 25 */
    -13em 24em,
    -12em 24em,
    -8em  24em,
    -7em  24em,
    -6em  24em,
    -3em  24em,
    -2em  24em,
    -1em  24em,
    4em   24em,
    5em   24em,
    6em   24em,
    15em  24em,
    16em  24em,
    /* row 26 */
    -12em 25em,
    -11em 25em,
    -8em  25em,
    -7em  25em,
    -6em  25em,
    -3em  25em,
    -2em  25em,
    -1em  25em,
    4em   25em,
    5em   25em,
    6em   25em,
    7em   25em,
    14em  25em,
    15em  25em,
    /* row 27 */
    -11em 26em,
    -10em 26em,
    -8em  26em,
    -7em  26em,
    -6em  26em,
    -3em  26em,
    -2em  26em,
    3em   26em,
    4em   26em,
    5em   26em,
    6em   26em,
    7em   26em,
    8em   26em,
    13em  26em,
    14em  26em,
    /* row 28 */
    -10em 27em,
    -9em  27em,
    -7em  27em,
    -6em  27em,
    -3em  27em,
    -2em  27em,
    -1em  27em,
    2em   27em,
    3em   27em,
    4em   27em,
    5em   27em,
    6em   27em,
    7em   27em,
    8em   27em,
    9em   27em,
    12em  27em,
    13em  27em,
    /* row 29 */
    -9em  28em,
    -8em  28em,
    -6em  28em,
    -3em  28em,
    -2em  28em,
    -1em  28em,
    2em   28em,
    3em   28em,
    4em   28em,
    5em   28em,
    6em   28em,
    7em   28em,
    8em   28em,
    9em   28em,
    11em  28em,
    12em  28em,
    /* row 30 */
    -8em  29em,
    -7em  29em,
    10em  29em,
    11em  29em,
    /* row 31 */
    -7em  30em,
    -6em  30em,
    9em   30em,
    10em  30em,
    /* row 32 */
    -6em  31em,
    -5em  31em,
    8em   31em,
    9em   31em,
    /* row 33 */
    -5em  32em,
    -4em  32em,
    7em   32em,
    8em   32em,
    /* row 34 */
    -4em  33em,
    -3em  33em,
    6em   33em,
    7em   33em,
    /* row 35 */
    -3em  34em,
    -2em  34em,
    5em   34em,
    6em   34em,
    /* row 36 */
    -2em  35em,
    -1em  35em,
    4em   35em,
    5em   35em,
    /* row 37 */
    -1em  36em,
    0     36em,
    1em   36em,
    2em   36em,
    3em   36em,
    4em   36em,
    /* row 38 */
    0     37em,
    1em   37em,
    2em   37em,
    3em   37em;
}

/* Animation */

@keyframes work {
  25% {
box-shadow:
    /* row 1 */
    inset 0 0 0 1em,
    1em   0,
    2em   0,
    3em   0,
    /* row 2 */
    -1em  1em,
    0     1em,
    1em   1em,
    2em   1em,
    3em   1em,
    4em   1em,
    /* row 3 */
    -2em  2em,
    -1em  2em,
    4em   2em,
    5em   2em,
    /* row 4 */
    -3em  3em,
    -2em  3em,
    5em   3em,
    6em   3em,
    /* row 5 */
    -4em  4em,
    -3em  4em,
    6em   4em,
    7em   4em,
    /* row 6 */
    -5em  5em,
    -4em  5em,
    7em   5em,
    8em   5em,
    /* row 7 */
    -6em  6em,
    -5em  6em,
    8em   6em,
    9em   6em,
    /* row 8 */
    -7em  7em,
    -6em  7em,
    0     7em,
    1em   7em,
    2em   7em,
    3em   7em,
    9em   7em,
    10em  7em,
    /* row 9 */
    -8em  8em,
    -7em  8em,
    -1em  8em,
    0     8em,
    1em   8em,
    2em   8em,
    3em   8em,
    4em   8em,
    10em  8em,
    11em  8em,
    /* row 10 */
    -9em  9em,
    -8em  9em,
    -1em  9em,
    0     9em,
    1em   9em,
    2em   9em,
    3em   9em,
    4em   9em,
    11em  9em,
    12em  9em,
    /* row 11 */
    -10em 10em,
    -9em  10em,
    -1em  10em,
    0     10em,
    1em   10em,
    2em   10em,
    3em   10em,
    4em   10em,
    12em  10em,
    13em  10em,
    /* row 12 */
    -11em 11em,
    -10em 11em,
    -1em  11em,
    0     11em,
    1em   11em,
    2em   11em,
    3em   11em,
    4em   11em,
    13em  11em,
    14em  11em,
    /* row 13 */
    -12em 12em,
    -11em 12em,
    -8em  12em,
    -7em  12em,
    -6em  12em,
    -5em  12em,
    -4em  12em,
    -3em  12em,
    -2em  12em,
    0     12em,
    1em   12em,
    2em   12em,
    3em   12em,
    14em  12em,
    15em  12em,
    /* row 14 */
    -13em 13em,
    -12em 13em,
    -8em  13em,
    -4em  13em,
    -3em  13em,
    -2em  13em,
    -1em  13em,
    15em  13em,
    16em  13em,
    /* row 15 */
    -14em 14em,
    -13em 14em,
    -7em  14em,
    -5em  14em,
    -4em  14em,
    -3em  14em,
    -2em  14em,
    -1em  14em,
    0     14em,
    16em  14em,
    17em  14em,
    /* row 16 */
    -15em 15em,
    -14em 15em,
    -7em  15em,
    -6em  15em,
    -5em  15em,
    -4em  15em,
    -3em  15em,
    -2em  15em,
    0     15em,
    17em  15em,
    18em  15em,
    /* row 17 */
    -16em 16em,
    -15em 16em,
    -7em  16em,
    -6em  16em,
    -5em  16em,
    -4em  16em,
    -3em  16em,
    0     16em,
    18em  16em,
    19em  16em,
    /* row 18 */
    -17em 17em,
    -16em 17em,
    -8em  17em,
    -7em  17em,
    -6em  17em,
    -5em  17em,
    -4em  17em,
    -3em  17em,
    0     17em,
    19em  17em,
    20em  17em,
    /* row 19 */
    -17em 18em,
    -16em 18em,
    -8em  18em,
    -7em  18em,
    -6em  18em,
    -5em  18em,
    -4em  18em,
    -2em  18em,
    0     18em,
    19em  18em,
    20em  18em,
    /* row 20 */
    -17em 19em,
    -16em 19em,
    -8em  19em,
    -7em  19em,
    -6em  19em,
    -5em  19em,
    -4em  19em,
    -1em  19em,
    0     19em,
    19em  19em,
    20em  19em,
    /* row 21 */
    -17em 20em,
    -16em 20em,
    -8em  20em,
    -7em  20em,
    -6em  20em,
    -5em  20em,
    -4em  20em,
    -3em  20em,
    0     20em,
    19em  20em,
    20em  20em,
    /* row 22 */
    -16em 21em,
    -15em 21em,
    -8em  21em,
    -7em  21em,
    -6em  21em,
    -5em  21em,
    -4em  21em,
    -3em  21em,
    -2em  21em,
    1em   21em,
    18em  21em,
    19em  21em,
    /* row 23 */
    -15em 22em,
    -14em 22em,
    -8em  22em,
    -7em  22em,
    -6em  22em,
    -4em  22em,
    -3em  22em,
    -2em  22em,
    -1em  22em,
    2em   22em,
    17em  22em,
    18em  22em,
    /* row 24 */
    -14em 23em,
    -13em 23em,
    -8em  23em,
    -7em  23em,
    -6em  23em,
    -3em  23em,
    -2em  23em,
    -1em  23em,
    3em   23em,
    16em  23em,
    17em  23em,
    /* row 25 */
    -13em 24em,
    -12em 24em,
    -8em  24em,
    -7em  24em,
    -6em  24em,
    -3em  24em,
    -2em  24em,
    -1em  24em,
    4em   24em,
    5em   24em,
    6em   24em,
    15em  24em,
    16em  24em,
    /* row 26 */
    -12em 25em,
    -11em 25em,
    -8em  25em,
    -7em  25em,
    -6em  25em,
    -3em  25em,
    -2em  25em,
    -1em  25em,
    4em   25em,
    5em   25em,
    6em   25em,
    7em   25em,
    14em  25em,
    15em  25em,
    /* row 27 */
    -11em 26em,
    -10em 26em,
    -8em  26em,
    -7em  26em,
    -6em  26em,
    -3em  26em,
    -2em  26em,
    3em   26em,
    4em   26em,
    5em   26em,
    6em   26em,
    7em   26em,
    8em   26em,
    13em  26em,
    14em  26em,
    /* row 28 */
    -10em 27em,
    -9em  27em,
    -7em  27em,
    -6em  27em,
    -3em  27em,
    -2em  27em,
    -1em  27em,
    2em   27em,
    3em   27em,
    4em   27em,
    5em   27em,
    6em   27em,
    7em   27em,
    8em   27em,
    9em   27em,
    12em  27em,
    13em  27em,
    /* row 29 */
    -9em  28em,
    -8em  28em,
    -6em  28em,
    -3em  28em,
    -2em  28em,
    -1em  28em,
    2em   28em,
    3em   28em,
    4em   28em,
    5em   28em,
    6em   28em,
    7em   28em,
    8em   28em,
    9em   28em,
    11em  28em,
    12em  28em,
    /* row 30 */
    -8em  29em,
    -7em  29em,
    10em  29em,
    11em  29em,
    /* row 31 */
    -7em  30em,
    -6em  30em,
    9em   30em,
    10em  30em,
    /* row 32 */
    -6em  31em,
    -5em  31em,
    8em   31em,
    9em   31em,
    /* row 33 */
    -5em  32em,
    -4em  32em,
    7em   32em,
    8em   32em,
    /* row 34 */
    -4em  33em,
    -3em  33em,
    6em   33em,
    7em   33em,
    /* row 35 */
    -3em  34em,
    -2em  34em,
    5em   34em,
    6em   34em,
    /* row 36 */
    -2em  35em,
    -1em  35em,
    4em   35em,
    5em   35em,
    /* row 37 */
    -1em  36em,
    0     36em,
    1em   36em,
    2em   36em,
    3em   36em,
    4em   36em,
    /* row 38 */
    0     37em,
    1em   37em,
    2em   37em,
    3em   37em;
}
  50% {
box-shadow:
    /* row 1 */
    inset 0 0 0 1em,
    1em   0,
    2em   0,
    3em   0,
    /* row 2 */
    -1em  1em,
    0     1em,
    1em   1em,
    2em   1em,
    3em   1em,
    4em   1em,
    /* row 3 */
    -2em  2em,
    -1em  2em,
    4em   2em,
    5em   2em,
    /* row 4 */
    -3em  3em,
    -2em  3em,
    5em   3em,
    6em   3em,
    /* row 5 */
    -4em  4em,
    -3em  4em,
    6em   4em,
    7em   4em,
    /* row 6 */
    -5em  5em,
    -4em  5em,
    7em   5em,
    8em   5em,
    /* row 7 */
    -6em  6em,
    -5em  6em,
    8em   6em,
    9em   6em,
    /* row 8 */
    -7em  7em,
    -6em  7em,
    0     7em,
    1em   7em,
    2em   7em,
    3em   7em,
    9em   7em,
    10em  7em,
    /* row 9 */
    -8em  8em,
    -7em  8em,
    -1em  8em,
    0     8em,
    1em   8em,
    2em   8em,
    3em   8em,
    4em   8em,
    10em  8em,
    11em  8em,
    /* row 10 */
    -9em  9em,
    -8em  9em,
    -1em  9em,
    0     9em,
    1em   9em,
    2em   9em,
    3em   9em,
    4em   9em,
    11em  9em,
    12em  9em,
    /* row 11 */
    -10em 10em,
    -9em  10em,
    -1em  10em,
    0     10em,
    1em   10em,
    2em   10em,
    3em   10em,
    4em   10em,
    12em  10em,
    13em  10em,
    /* row 12 */
    -11em 11em,
    -10em 11em,
    -1em  11em,
    0     11em,
    1em   11em,
    2em   11em,
    3em   11em,
    4em   11em,
    13em  11em,
    14em  11em,
    /* row 13 */
    -12em 12em,
    -11em 12em,
    -9em  12em,
    -8em  12em,
    -7em  12em,
    -6em  12em,
    -5em  12em,
    -4em  12em,
    -3em  12em,
    -2em  12em,
    0     12em,
    1em   12em,
    2em   12em,
    3em   12em,
    14em  12em,
    15em  12em,
    /* row 14 */
    -13em 13em,
    -12em 13em,
    -9em  13em,
    -4em  13em,
    -3em  13em,
    -2em  13em,
    -1em  13em,
    15em  13em,
    16em  13em,
    /* row 15 */
    -14em 14em,
    -13em 14em,
    -8em  14em,
    -5em  14em,
    -4em  14em,
    -3em  14em,
    -2em  14em,
    -1em  14em,
    0     14em,
    16em  14em,
    17em  14em,
    /* row 16 */
    -15em 15em,
    -14em 15em,
    -7em  15em,
    -6em  15em,
    -5em  15em,
    -4em  15em,
    -3em  15em,
    -2em  15em,
    0     15em,
    17em  15em,
    18em  15em,
    /* row 17 */
    -16em 16em,
    -15em 16em,
    -7em  16em,
    -6em  16em,
    -5em  16em,
    -4em  16em,
    -3em  16em,
    0     16em,
    18em  16em,
    19em  16em,
    /* row 18 */
    -17em 17em,
    -16em 17em,
    -8em  17em,
    -7em  17em,
    -6em  17em,
    -5em  17em,
    -4em  17em,
    -2em  17em,
    0     17em,
    19em  17em,
    20em  17em,
    /* row 19 */
    -17em 18em,
    -16em 18em,
    -8em  18em,
    -7em  18em,
    -6em  18em,
    -5em  18em,
    -4em  18em,
    -1em  18em,
    0     18em,
    19em  18em,
    20em  18em,
    /* row 20 */
    -17em 19em,
    -16em 19em,
    -8em  19em,
    -7em  19em,
    -6em  19em,
    -5em  19em,
    -4em  19em,
    1em   19em,
    19em  19em,
    20em  19em,
    /* row 21 */
    -17em 20em,
    -16em 20em,
    -8em  20em,
    -7em  20em,
    -6em  20em,
    -5em  20em,
    -4em  20em,
    -3em  20em,
    2em   20em,
    19em  20em,
    20em  20em,
    /* row 22 */
    -16em 21em,
    -15em 21em,
    -8em  21em,
    -7em  21em,
    -6em  21em,
    -5em  21em,
    -4em  21em,
    -3em  21em,
    -2em  21em,
    3em   21em,
    18em  21em,
    19em  21em,
    /* row 23 */
    -15em 22em,
    -14em 22em,
    -8em  22em,
    -7em  22em,
    -6em  22em,
    -4em  22em,
    -3em  22em,
    -2em  22em,
    -1em  22em, 
    4em   22em,
    5em   22em,
    6em   22em,
    7em   22em,
    17em  22em,
    18em  22em,
    /* row 24 */
    -14em 23em,
    -13em 23em,
    -8em  23em,
    -7em  23em,
    -6em  23em,
    -3em  23em,
    -2em  23em,
    -1em  23em,
    4em   23em,
    5em   23em,
    6em   23em,
    7em   23em,
    8em   23em,
    16em  23em,
    17em  23em,
    /* row 25 */
    -13em 24em,
    -12em 24em,
    -8em  24em,
    -7em  24em,
    -6em  24em,
    -3em  24em,
    -2em  24em,
    -1em  24em,
    4em   24em,
    5em   24em,
    6em   24em,
    7em   24em,
    8em   24em,
    15em  24em,
    16em  24em,
    /* row 26 */
    -12em 25em,
    -11em 25em,
    -8em  25em,
    -7em  25em,
    -6em  25em,
    -3em  25em,
    -2em  25em,
    -1em  25em,
    4em   25em,
    5em   25em,
    6em   25em,
    7em   25em,
    8em   25em,
    14em  25em,
    15em  25em,
    /* row 27 */
    -11em 26em,
    -10em 26em,
    -8em  26em,
    -7em  26em,
    -6em  26em,
    -3em  26em,
    -2em  26em,
    3em   26em,
    4em   26em,
    5em   26em,
    6em   26em,
    7em   26em,
    8em   26em,
    13em  26em,
    14em  26em,
    /* row 28 */
    -10em 27em,
    -9em  27em,
    -7em  27em,
    -6em  27em,
    -3em  27em,
    -2em  27em,
    -1em  27em,
    2em   27em,
    3em   27em,
    4em   27em,
    5em   27em,
    6em   27em,
    7em   27em,
    8em   27em,
    9em   27em,
    12em  27em,
    13em  27em,
    /* row 29 */
    -9em  28em,
    -8em  28em,
    -6em  28em,
    -3em  28em,
    -2em  28em,
    -1em  28em,
    2em   28em,
    3em   28em,
    4em   28em,
    5em   28em,
    6em   28em,
    7em   28em,
    8em   28em,
    9em   28em,
    11em  28em,
    12em  28em,
    /* row 30 */
    -8em  29em,
    -7em  29em,
    10em  29em,
    11em  29em,
    /* row 31 */
    -7em  30em,
    -6em  30em,
    9em   30em,
    10em  30em,
    /* row 32 */
    -6em  31em,
    -5em  31em,
    8em   31em,
    9em   31em,
    /* row 33 */
    -5em  32em,
    -4em  32em,
    7em   32em,
    8em   32em,
    /* row 34 */
    -4em  33em,
    -3em  33em,
    6em   33em,
    7em   33em,
    /* row 35 */
    -3em  34em,
    -2em  34em,
    5em   34em,
    6em   34em,
    /* row 36 */
    -2em  35em,
    -1em  35em,
    4em   35em,
    5em   35em,
    /* row 37 */
    -1em  36em,
    0     36em,
    1em   36em,
    2em   36em,
    3em   36em,
    4em   36em,
    /* row 38 */
    0     37em,
    1em   37em,
    2em   37em,
    3em   37em;
}

  75% {
box-shadow:
    /* row 1 */
    inset 0 0 0 1em,
    1em   0,
    2em   0,
    3em   0,
    /* row 2 */
    -1em  1em,
    0     1em,
    1em   1em,
    2em   1em,
    3em   1em,
    4em   1em,
    /* row 3 */
    -2em  2em,
    -1em  2em,
    4em   2em,
    5em   2em,
    /* row 4 */
    -3em  3em,
    -2em  3em,
    5em   3em,
    6em   3em,
    /* row 5 */
    -4em  4em,
    -3em  4em,
    6em   4em,
    7em   4em,
    /* row 6 */
    -5em  5em,
    -4em  5em,
    7em   5em,
    8em   5em,
    /* row 7 */
    -6em  6em,
    -5em  6em,
    8em   6em,
    9em   6em,
    /* row 8 */
    -7em  7em,
    -6em  7em,
    0     7em,
    1em   7em,
    2em   7em,
    3em   7em,
    9em   7em,
    10em  7em,
    /* row 9 */
    -8em  8em,
    -7em  8em,
    -1em  8em,
    0     8em,
    1em   8em,
    2em   8em,
    3em   8em,
    4em   8em,
    10em  8em,
    11em  8em,
    /* row 10 */
    -9em  9em,
    -8em  9em,
    -1em  9em,
    0     9em,
    1em   9em,
    2em   9em,
    3em   9em,
    4em   9em,
    11em  9em,
    12em  9em,
    /* row 11 */
    -10em 10em,
    -9em  10em,
    -1em  10em,
    0     10em,
    1em   10em,
    2em   10em,
    3em   10em,
    4em   10em,
    12em  10em,
    13em  10em,
    /* row 12 */
    -11em 11em,
    -10em 11em,
    -1em  11em,
    0     11em,
    1em   11em,
    2em   11em,
    3em   11em,
    4em   11em,
    13em  11em,
    14em  11em,
    /* row 13 */
    -12em 12em,
    -11em 12em,
    -9em  12em,
    -8em  12em,
    -7em  12em,
    -6em  12em,
    -5em  12em,
    -4em  12em,
    -3em  12em,
    -2em  12em,
    0     12em,
    1em   12em,
    2em   12em,
    3em   12em,
    14em  12em,
    15em  12em,
    /* row 14 */
    -13em 13em,
    -12em 13em,
    -9em  13em,
    -4em  13em,
    -3em  13em,
    -2em  13em,
    -1em  13em,
    15em  13em,
    16em  13em,
    /* row 15 */
    -14em 14em,
    -13em 14em,
    -9em  14em,
    -5em  14em,
    -4em  14em,
    -3em  14em,
    -2em  14em,
    -1em  14em,
    0     14em,
    16em  14em,
    17em  14em,
    /* row 16 */
    -15em 15em,
    -14em 15em,
    -9em  15em,
    -7em  15em,
    -6em  15em,
    -5em  15em,
    -4em  15em,
    -3em  15em,
    -2em  15em,
    0     15em,
    17em  15em,
    18em  15em,
    /* row 17 */
    -16em 16em,
    -15em 16em,
    -9em  16em,
    -8em  16em,
    -7em  16em,
    -6em  16em,
    -5em  16em,
    -4em  16em,
    -3em  16em,
    0     16em,
    18em  16em,
    19em  16em,
    /* row 18 */
    -17em 17em,
    -16em 17em,
    -8em  17em,
    -7em  17em,
    -6em  17em,
    -5em  17em,
    -4em  17em,
    0     17em,
    19em  17em,
    20em  17em,
    /* row 19 */
    -17em 18em,
    -16em 18em,
    -8em  18em,
    -7em  18em,
    -6em  18em,
    -5em  18em,
    -4em  18em,
    -3em  18em,
    -2em  18em,
    0     18em,
    6em   18em,
    7em   18em,
    19em  18em,
    20em  18em,
    /* row 20 */
    -17em 19em,
    -16em 19em,
    -8em  19em,
    -7em  19em,
    -6em  19em,
    -5em  19em,
    -4em  19em,
    -1em  19em,
    0     19em,
    1em   19em,
    5em   19em,
    6em   19em,
    7em   19em,
    8em   19em,
    19em  19em,
    20em  19em,
    /* row 21 */
    -17em 20em,
    -16em 20em,
    -8em  20em,
    -7em  20em,
    -6em  20em,
    -5em  20em,
    -4em  20em,
    -3em  20em,
    2em   20em,
    3em   20em,
    4em   20em,
    5em   20em,
    6em   20em,
    7em   20em,
    8em   20em,
    9em   20em,
    19em  20em,
    20em  20em,
    /* row 22 */
    -16em 21em,
    -15em 21em,
    -8em  21em,
    -7em  21em,
    -6em  21em,
    -5em  21em,
    -4em  21em,
    -3em  21em,
    -2em  21em,
    4em   21em,
    5em   21em,
    6em   21em,
    7em   21em,
    8em   21em,
    9em   21em,
    18em  21em,
    19em  21em,
    /* row 23 */
    -15em 22em,
    -14em 22em,
    -8em  22em,
    -7em  22em,
    -6em  22em,
    -4em  22em,
    -3em  22em,
    -2em  22em,
    -1em  22em,
    4em   22em,
    5em   22em,
    6em   22em,
    7em   22em,
    8em   22em,
    9em   22em,
    17em  22em,
    18em  22em,
    /* row 24 */
    -14em 23em,
    -13em 23em,
    -8em  23em,
    -7em  23em,
    -6em  23em,
    -3em  23em,
    -2em  23em,
    -1em  23em,
    7em   23em,
    8em   23em,
    9em   23em,
    16em  23em,
    17em  23em,
    /* row 25 */
    -13em 24em,
    -12em 24em,
    -8em  24em,
    -7em  24em,
    -6em  24em,
    -3em  24em,
    -2em  24em,
    -1em  24em,
    5em   24em,
    6em   24em,
    15em  24em,
    16em  24em,
    /* row 26 */
    -12em 25em,
    -11em 25em,
    -8em  25em,
    -7em  25em,
    -6em  25em,
    -3em  25em,
    -2em  25em,
    -1em  25em,
    4em   25em,
    5em   25em,
    6em   25em,
    7em   25em,
    14em  25em,
    15em  25em,
    /* row 27 */
    -11em 26em,
    -10em 26em,
    -8em  26em,
    -7em  26em,
    -6em  26em,
    -3em  26em,
    -2em  26em,
    3em   26em,
    4em   26em,
    5em   26em,
    6em   26em,
    7em   26em,
    8em   26em,
    13em  26em,
    14em  26em,
    /* row 28 */
    -10em 27em,
    -9em  27em,
    -7em  27em,
    -6em  27em,
    -3em  27em,
    -2em  27em,
    -1em  27em,
    2em   27em,
    3em   27em,
    4em   27em,
    5em   27em,
    6em   27em,
    7em   27em,
    8em   27em,
    9em   27em,
    12em  27em,
    13em  27em,
    /* row 29 */
    -9em  28em,
    -8em  28em,
    -6em  28em,
    -3em  28em,
    -2em  28em,
    -1em  28em,
    2em   28em,
    3em   28em,
    4em   28em,
    5em   28em,
    6em   28em,
    7em   28em,
    8em   28em,
    9em   28em,
    11em  28em,
    12em  28em,
    /* row 30 */
    -8em  29em,
    -7em  29em,
    10em  29em,
    11em  29em,
    /* row 31 */
    -7em  30em,
    -6em  30em,
    9em   30em,
    10em  30em,
    /* row 32 */
    -6em  31em,
    -5em  31em,
    8em   31em,
    9em   31em,
    /* row 33 */
    -5em  32em,
    -4em  32em,
    7em   32em,
    8em   32em,
    /* row 34 */
    -4em  33em,
    -3em  33em,
    6em   33em,
    7em   33em,
    /* row 35 */
    -3em  34em,
    -2em  34em,
    5em   34em,
    6em   34em,
    /* row 36 */
    -2em  35em,
    -1em  35em,
    4em   35em,
    5em   35em,
    /* row 37 */
    -1em  36em,
    0     36em,
    1em   36em,
    2em   36em,
    3em   36em,
    4em   36em,
    /* row 38 */
    0     37em,
    1em   37em,
    2em   37em,
    3em   37em;
}
  100% {
box-shadow:
    /* row 1 */
    inset 0 0 0 1em,
    1em   0,
    2em   0,
    3em   0,
    /* row 2 */
    -1em  1em,
    0     1em,
    1em   1em,
    2em   1em,
    3em   1em,
    4em   1em,
    /* row 3 */
    -2em  2em,
    -1em  2em,
    4em   2em,
    5em   2em,
    /* row 4 */
    -3em  3em,
    -2em  3em,
    5em   3em,
    6em   3em,
    /* row 5 */
    -4em  4em,
    -3em  4em,
    6em   4em,
    7em   4em,
    /* row 6 */
    -5em  5em,
    -4em  5em,
    7em   5em,
    8em   5em,
    /* row 7 */
    -6em  6em,
    -5em  6em,
    8em   6em,
    9em   6em,
    /* row 8 */
    -7em  7em,
    -6em  7em,
    0     7em,
    1em   7em,
    2em   7em,
    3em   7em,
    9em   7em,
    10em  7em,
    /* row 9 */
    -8em  8em,
    -7em  8em,
    -1em  8em,
    0     8em,
    1em   8em,
    2em   8em,
    3em   8em,
    4em   8em,
    10em  8em,
    11em  8em,
    /* row 10 */
    -9em  9em,
    -8em  9em,
    -1em  9em,
    0     9em,
    1em   9em,
    2em   9em,
    3em   9em,
    4em   9em,
    11em  9em,
    12em  9em,
    /* row 11 */
    -10em 10em,
    -9em  10em,
    -1em  10em,
    0     10em,
    1em   10em,
    2em   10em,
    3em   10em,
    4em   10em,
    9em   10em,
    10em  10em,
    12em  10em,
    13em  10em,
    /* row 12 */
    -11em 11em,
    -10em 11em,
    -1em  11em,
    0     11em,
    1em   11em,
    2em   11em,
    3em   11em,
    4em   11em,
    7em   11em,
    9em   11em,
    10em  11em,
    13em  11em,
    14em  11em,
    /* row 13 */
    -12em 12em,
    -11em 12em,
    -9em  12em,
    -8em  12em,
    -7em  12em,
    -6em  12em,
    -5em  12em,
    -4em  12em,
    -3em  12em,
    -2em  12em,
    0     12em,
    1em   12em,
    2em   12em,
    3em   12em,
    14em  12em,
    15em  12em,
    /* row 14 */
    -13em 13em,
    -12em 13em,
    -9em  13em,
    -4em  13em,
    -3em  13em,
    -2em  13em,
    -1em  13em,
    8em   13em,
    15em  13em,
    16em  13em,
    /* row 15 */
    -14em 14em,
    -13em 14em,
    -9em  14em,
    -5em  14em,
    -4em  14em,
    -3em  14em,
    -2em  14em,
    -1em  14em,
    0     14em,
    8em   14em,
    10em  14em,
    16em  14em,
    17em  14em,
    /* row 16 */
    -15em 15em,
    -14em 15em,
    -9em  15em,
    -7em  15em,
    -6em  15em,
    -5em  15em,
    -4em  15em,
    -3em  15em,
    -2em  15em,
    0     15em,
    6em   15em,
    10em  15em,
    17em  15em,
    18em  15em,
    /* row 17 */
    -16em 16em,
    -15em 16em,
    -9em  16em,
    -7em  16em,
    -6em  16em,
    -5em  16em,
    -4em  16em,
    -3em  16em,
    0     16em,
    6em   16em,
    8em   16em,
    18em  16em,
    19em  16em,
    /* row 18 */
    -17em 17em,
    -16em 17em,
    -9em  17em,
    -8em  17em,
    -7em  17em,
    -6em  17em,
    -5em  17em,
    -4em  17em,
    0     17em,
    19em  17em,
    20em  17em,
    /* row 19 */
    -17em 18em,
    -16em 18em,
    -9em  18em,
    -8em  18em,
    -7em  18em,
    -6em  18em,
    -5em  18em,
    -4em  18em,
    -3em  18em,
    -2em  18em,
    -1em  18em,
    0     18em,
    1em   18em,
    2em   18em,
    3em   18em,
    4em   18em,
    5em   18em,
    6em   18em,
    7em   18em,
    8em   18em,
    9em   18em,
    10em  18em,
    11em  18em,
    19em  18em,
    20em  18em,
    /* row 20 */
    -17em 19em,
    -16em 19em,
    -8em  19em,
    -7em  19em,
    -6em  19em,
    -5em  19em,
    -4em  19em,
    0     19em,
    6em   19em,
    7em   19em,
    8em   19em,
    9em   19em,
    10em  19em,
    19em  19em,
    20em  19em,
    /* row 21 */
    -17em 20em,
    -16em 20em,
    -8em  20em,
    -7em  20em,
    -6em  20em,
    -5em  20em,
    -4em  20em,
    -3em  20em,
    6em   20em,
    7em   20em,
    8em   20em,
    9em   20em,
    19em  20em,
    20em  20em,
    /* row 22 */
    -16em 21em,
    -15em 21em,
    -8em  21em,
    -7em  21em,
    -6em  21em,
    -5em  21em,
    -4em  21em,
    -3em  21em,
    -2em  21em,
    18em  21em,
    19em  21em,
    /* row 23 */
    -15em 22em,
    -14em 22em,
    -8em  22em,
    -7em  22em,
    -6em  22em,
    -4em  22em,
    -3em  22em,
    -2em  22em,
    -1em  22em,
    17em  22em,
    18em  22em,
    /* row 24 */
    -14em 23em,
    -13em 23em,
    -8em  23em,
    -7em  23em,
    -6em  23em,
    -3em  23em,
    -2em  23em,
    -1em  23em,
    16em  23em,
    17em  23em,
    /* row 25 */
    -13em 24em,
    -12em 24em,
    -8em  24em,
    -7em  24em,
    -6em  24em,
    -3em  24em,
    -2em  24em,
    -1em  24em,
    5em   24em,
    6em   24em,
    15em  24em,
    16em  24em,
    /* row 26 */
    -12em 25em,
    -11em 25em,
    -8em  25em,
    -7em  25em,
    -6em  25em,
    -3em  25em,
    -2em  25em,
    -1em  25em,
    4em   25em,
    5em   25em,
    6em   25em,
    7em   25em,
    14em  25em,
    15em  25em,
    /* row 27 */
    -11em 26em,
    -10em 26em,
    -8em  26em,
    -7em  26em,
    -6em  26em,
    -3em  26em,
    -2em  26em,
    3em   26em,
    4em   26em,
    5em   26em,
    6em   26em,
    7em   26em,
    8em   26em,
    13em  26em,
    14em  26em,
    /* row 28 */
    -10em 27em,
    -9em  27em,
    -7em  27em,
    -6em  27em,
    -3em  27em,
    -2em  27em,
    -1em  27em,
    2em   27em,
    3em   27em,
    4em   27em,
    5em   27em,
    6em   27em,
    7em   27em,
    8em   27em,
    9em   27em,
    12em  27em,
    13em  27em,
    /* row 29 */
    -9em  28em,
    -8em  28em,
    -6em  28em,
    -3em  28em,
    -2em  28em,
    -1em  28em,
    2em   28em,
    3em   28em,
    4em   28em,
    5em   28em,
    6em   28em,
    7em   28em,
    8em   28em,
    9em   28em,
    11em  28em,
    12em  28em,
    /* row 30 */
    -8em  29em,
    -7em  29em,
    10em  29em,
    11em  29em,
    /* row 31 */
    -7em  30em,
    -6em  30em,
    9em   30em,
    10em  30em,
    /* row 32 */
    -6em  31em,
    -5em  31em,
    8em   31em,
    9em   31em,
    /* row 33 */
    -5em  32em,
    -4em  32em,
    7em   32em,
    8em   32em,
    /* row 34 */
    -4em  33em,
    -3em  33em,
    6em   33em,
    7em   33em,
    /* row 35 */
    -3em  34em,
    -2em  34em,
    5em   34em,
    6em   34em,
    /* row 36 */
    -2em  35em,
    -1em  35em,
    4em   35em,
    5em   35em,
    /* row 37 */
    -1em  36em,
    0     36em,
    1em   36em,
    2em   36em,
    3em   36em,
    4em   36em,
    /* row 38 */
    0     37em,
    1em   37em,
    2em   37em,
    3em   37em;
}
}
		</style>
		
    </head>

    <body>

	<center>
	<br><br><br><br><br>
	
	<div style="padding: 0 0 0 160px;"><h1>ONSSA</h1> </div>
	<br><br><br><br><br>
			<div class="construction"></div>
	<br><br><br><br><br>
	<div style="padding: 0 0 0 160px;"><h1>Site web sous construction</h1> </div>
	</center>
	
	</body>
</html>