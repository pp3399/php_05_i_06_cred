<?php

// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path . '/lib/smarty/Smarty.class.php';
require_once $conf->root_path . '/lib/Messages.class.php';
require_once $conf->root_path . '/app/calc/CalcForm.class.php';
require_once $conf->root_path . '/app/calc/CalcResult.class.php';

/** Kontroler kalkulatora
 * @author Przemysław Kudłacik
 *
 */
class CalcCtrl {

    private $msgs;   //wiadomości dla widoku
    private $form;   //dane formularza (do obliczeń i dla widoku)
    private $result; //inne dane dla widoku

    /**
     * Konstruktor - inicjalizacja właściwości
     */
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->msgs = new Messages();
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }

    /**
     * Pobranie parametrów
     */
    public function getParams() {
        $this->form->amt = isset($_REQUEST ['amt']) ? $_REQUEST ['amt'] : null;
        $this->form->yrs = isset($_REQUEST ['yrs']) ? $_REQUEST ['yrs'] : null;
        $this->form->rt = isset($_REQUEST ['rt']) ? $_REQUEST ['rt'] : null;
    }

    /**
     * Walidacja parametrów
     * @return true jeśli brak błedów, false w przeciwnym wypadku 
     */
    public function validate() {
        // sprawdzenie, czy parametry zostały przekazane
        if (!(isset($this->form->amt) && isset($this->form->yrs) && isset($this->form->rt))) {
            // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
            return false; //zakończ walidację z błędem
        }

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if ($this->form->amt == "") {
            $this->msgs->addError('Nie podano liczby 1');
        }
        if ($this->form->yrs == "") {
            $this->msgs->addError('Nie podano liczby 2');
        }
        if ($this->form->rt == "") {
            $this->msgs->addError('Nie podano liczby 3');
        }

        // nie ma sensu walidować dalej gdy brak parametrów
        if (!$this->msgs->isError()) {

            // sprawdzenie, czy $x i $y są liczbami całkowitymi
            if (!is_numeric($this->form->amt)) {
                $this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
            }

            if (!is_numeric($this->form->yrs)) {
                $this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
            }

            if (!is_numeric($this->form->rt)) {
                $this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
            }
        }

        return !$this->msgs->isError();
    }

    /**
     * Pobranie wartości, walidacja, obliczenie i wyświetlenie
     */
    public function process() {

        $this->getparams();

        if ($this->validate()) {

            //konwersja parametrów na int
            $this->form->amt = intval($this->form->amt);
            $this->form->yrs = intval($this->form->yrs);
            $this->form->rt = intval($this->form->rt);
            $this->msgs->addInfo('Parametry poprawne.');

            //wykonanie operacji
            $amount = $this->form->amt;
            $years = $this->form->yrs * 12;
            $rate = $this->form->rt / 100;

            $result = ($amount * $rate) / (12 * (1 - ((12 / (12 + $rate)) ** $years))); //wzór na raty równe
            $this->result->result = number_format($result, 2, ',', ' '); //zaokrąglanie do 2 miejsc po przecinku - ? notacja francuska ?

            $this->msgs->addInfo('Wykonano obliczenia.');
        }

        $this->generateView();
    }

    /**
     * Wygenerowanie widoku
     */
    public function generateView() {
        global $conf;

        $smarty = new Smarty();
        $smarty->assign('conf', $conf);

        $smarty->assign('page_title', 'Przykład 06');
        $smarty->assign('page_description', 'Aplikacja z jednym "punktem wejścia". Model MVC, w którym jeden główny kontroler używa różnych obiektów kontrolerów w zależności od wybranej akcji - przekazanej parametrem.');
        $smarty->assign('page_header', 'Kontroler główny');

        $smarty->assign('msgs', $this->msgs);
        $smarty->assign('form', $this->form);
        $smarty->assign('res', $this->result);

        $smarty->display($conf->root_path . '/app/calc/CalcView.tpl');
    }

}
