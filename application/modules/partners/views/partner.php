<?
defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('supplement/header'); 

$this->load->view('admin/settings');
?>

<section id="crumbs"><ul><li>Tu jesteś:</li><li><a href="<?=site_url('admin')?>">Panel administracyjny</a></li><li><a href="<?=site_url('zarzadzanie/partnerzy')?>">Lista partnerów</a></li><li>Partner</li></ul></section>

<article id="content" class="admin">
    <aside class="admin">
    	<ul>
        	<li><a href="<?=current_url()?>#status" rel="facebox" title="Zmień status partnera"><i class="fa fa-external-link-square"></i></a></li>
        	<li><a href="<?=current_url()?>#dodaj-notatka" rel="facebox" title="Dodaj notatkę"><i class="fa fa-comment"></i></a></li>
        	<li><a href="<?=current_url()?>#dodaj-dokument" rel="facebox" title="Dodaj dokument"><i class="fa fa-file-text"></i></a></li>
        	<li><a href="<?=current_url()?>#usun" rel="facebox" title="Usuń partnera"><i class="fa  fa-close"></i></a></li>
        </ul>
    </aside>

    <div id="status" class="hide">
    	<header><h3>Zmień status partnera</h3></header>
        <form action="<?=site_url('partner/set_status')?>" enctype="multipart/form-data" method="post">
            <select name="status">
                <option value="1"<?=$this->selected('1',$dane->status)?>>zablokowany</option>
                <option value="2"<?=$this->selected('2',$dane->status)?>>aktywny</option>
            </select>
            <input type="hidden" name="wpis" value="<?=$dane->id?>">
            <input type="submit" value="Zapisz zmianę">
        </form>
    </div>
    <div id="oprocentowanie" class="hide">
    	<header><h3>Zmień oprocentowanie</h3></header>
        <form action="<?=site_url('partner/set_oprocentowanie')?>" enctype="multipart/form-data" method="post">
            <input type="text" name="oprocentowanie" value="<?=$this->oprocentowaniePartner($dane->id)?>">
            <input type="hidden" name="wpis" value="<?=$dane->id?>">
            <input type="submit" value="Zapisz zmianę">
        </form>
    </div>
    <div id="usun" class="hide">
        <header><h3>Usuń partnera</h3></header>
        <i class="fa  fa-close"></i>
        <p>Czy jesteś pewien, że chcesz usunąć partnera <strong><?=$dane->nazwa?></strong>?</p>
        <p><a href="<?=site_url('partner/usun/'.$dane->id)?>">Tak, usuń partnera!</a></p>
    </div>
	<header>
    	<h3>Dane partnera</h3>
    </header>   
    <ul class="submenu">
    	<li><a href="#prowizja-partnera">Prowizja partnera</a></li>
    	<li><a href="#wnioski-klientow">Wnioski klientów</a></li>
        <li><a href="#notatki">Notatki</a></li>
        <li><a href="#dokumenty">Dokumenty</a></li>
        <li><a href="#historia-administracyjna">Historia administracyjna</a></li>
    </ul>
    <div class="hr less"></div>
    <aside class="admin">
    	<ul>
        	<li><a href="<?=site_url('partner/edytuj/'.$dane->id)?>" title="Edytuj dane partnera"><i class="fa fa-cart-arrow-down"></i></a></li>
        	<li><a href="<?=current_url()?>#oprocentowanie" rel="facebox" title="Zmień oprocentowanie"><i class="fa fa-pie-chart"></i></a></li>
        </ul>
    </aside>
    <table class="wniosek dane">
    	<tr>
        	<td class="header">Dane firmy</td>
            <td><?=$dane->dane?></td>
        	<td class="header">Nazwa partnera</td>
            <td><?=$dane->partner?></td>
        </tr>
    	<tr>
        	<td class="header">Nazwa firmy</td>
            <td><?=$dane->nazwa?></td>
        	<td class="header">NIP</td>
            <td><?=$dane->nip?></td>
        </tr>
        <tr>
        	<td class="header">Opiekun</td>
            <td><?=$dane->opiekun?></td>
        	<td class="header">Osoba kontaktowa</td>
            <td><?=$dane->osoba?></td>
        </tr>
    	<tr>
        	<td class="header">Telefon</td>
            <td><?=$dane->telefon?></td>
        	<td class="header">Adres e-mail</td>
            <td><a href="mailto:<?=$dane->email?>"><?=$dane->email?></a></td>
        </tr>
    	<tr>
        	<td class="header">Oprocentowanie</td>
            <td><?=$this->oprocentowaniePartner($dane->id)?>%</td>
        	<td class="header">Partner nadrzędny</td>
            <td><?=$dane->npartner?$this->partner($dane->npartner):'brak'?><a href="#edytuj-partner" rel="facebox" title="Zmień partnera nadrzędnego"><i class="fa fa-shopping-cart"></i></a></td>
        </tr>
    	<tr>
        	<td class="header">Identyfikator</td>
            <td><?=$dane->id?></td>
        	<td class="header">Hasło</td>
            <td class="notransform"><?=$dane->haslo?></td>
        </tr>
    	<tr>
        	<td class="header">Numer konta bankowego</td>
            <td colspan="3"><?=$dane->konto?></td>
        </tr>
    	<tr>
        	<td class="header">Link do strony</td>
            <td><?=$dane->linkStrona?></td>
        	<td class="header">Link do aukcji</td>
            <td><?=$dane->linkAukcja?></td>
        </tr>
    	<tr>
        	<td class="header">Branża</td>
            <td><?=$dane->branza?></td>
        	<td class="header">Status Meritum</td>
            <td><?=$dane->statusMeritum?></td>
        </tr>
    	<tr>
        	<td class="header">Status umowy z nami</td>
            <td><?=$dane->statusUmowa?></td>
        	<td class="header">Status wysłanej umowy z Meritum</td>
            <td><?=$dane->statusUmowaMeritum?></td>
        </tr>
        <tr>
        	<td class="header">Buttony</td>
            <td><?=$dane->buttony?></td>
        	<td class="header">Buttony sprawdzenie</td>
            <td><?=$dane->buttonySprawdzenie?></td>
        </tr>
        <tr>
        	<td class="header">Prowizja dla opiekuna</td>
            <td><?=$dane->prowizjaOpiekun?></td>
        	<td class="header">Prowizja dla partnera</td>
            <td><?=$dane->prowizjaPartner?></td>
		</tr>
        <tr>
        	<td class="header">Program assistance</td>
            <td><?=$dane->assistance==1? 'aktywny' : 'nieaktywny'?></td>
            <td></td>
            <td></td>
		</tr>
		<tr>
        	<td class="header">Prowizja dla partnera [Home]</td>
            <td><?=$dane->prowizja_home?>%</td>
        	<td class="header">Prowizja dla partnera [Office]</td>
            <td><?=$dane->prowizja_office?>%</td>
        </tr>
		<tr>
        	<td class="header">Koszt Home Assistance dla partnera</td>
            <td><?=$dane->koszt_home?> PLN</td>
        	<td class="header">Koszt Office Assistance dla partnera</td>
            <td><?=$dane->koszt_office?> PLN</td>
        </tr>
    </table>
    <div id="edytuj-partner" class="hide">
    	<header><h3>Edytuj partnera nadrzędnego</h3></header>
        <form action="<?=site_url('partner/partner/zmien')?>" enctype="multipart/form-data" method="post">
        	<label>Wybierz partnera</label>
            <select name="npartner">
            	<option value="0">brak</option>
                <? foreach($partnerzy['partner'] as $partner) {?>
                <option value="<?=$partner['id']?>"<?=$this->selected($partner['id'],$dane->npartner)?>><?=$partner['nazwa']?></option>
                <? } ?>
            </select>
        	<input type="hidden" name="wpis" value="<?=$dane->id?>">
            <input type="submit" value="Zapisz zmianę">
        </form>
    </div>

    <header><h4>Prowizja partnera<a name="prowizja-partnera"></a></h4></header>
    <div class="hr less"></div>
    <table class="dane">
    	<tr>
            <th class="center">Miesiąc</th>
            <th class="right">Kwota</th>
            <th>Szczegóły</th>
        </tr>
    <? foreach($zestawienie->result() as $dane) { ?>    
		<tr>
            <td class="center"><?=date("Y-m",strtotime($dane->miesiac))?></td>
        	<td class="right"><?=$this->kwota($dane->kwota)?></td>
            <td><a href="<?=site_url('prowizja/partner/'.$this->uri->segment(2).'/'.date("Y-m",strtotime($dane->miesiac)).'')?>" title="Szczegóły wniosku"><i class="fa fa-eye "></i></a></td>
        </tr>
    <? } ?>
    </table>

    <header><h4>Wnioski klientów<a name="wnioski-klientow"></a></h4></header>
    <div class="hr less"></div>
    <table class="dane">
    	<tr>
        	<th class="right">ID</th>
            <th>Wnioskodawca</th>
            <th class="right">Kwota</th>
            <th class="center">Data złożenia</th>
            <th>Produkt</th>
            <th>Status</th>
        </tr>
    <? foreach($wnioski->result() as $dane) { ?>    
		<tr>
        	<td class="right"><?=$dane->id?></td>
        	<? if($dane->rodzaj == '1') { ?>
            <td><strong><a href="<?=site_url('wniosek/'.$dane->id)?>"><?=$this->wnioskodawca($dane->id)?></a></strong></td>
            <? } else { ?>
        	<td><strong><a href="<?=site_url('wniosek/'.$dane->id)?>"><?=$this->wnioskodawca_finansowe($dane->id)?></a></strong></td>
            <? } ?>
        	<td class="right"><?=$this->kwota($dane->kwota)?></td>
            <td class="center"><?=$dane->data?></td>
            <td class="notransform"><?=$this->rodzaj($dane->rodzaj)?></td>
            <td><?=$this->status($dane->status)?></td>
        </tr>
    <? } ?>
    </table>

    <header><h4>Notatki<a name="notatki"></a></h4></header>
    <div class="hr less"></div>
    <aside class="admin">
    	<ul>
        	<li><a href="<?=current_url()?>#dodaj-notatka" rel="facebox" title="Dodaj notatkę"><i class="fa fa-comment"></i></a></li>
        </ul>
    </aside>
    <div id="dodaj-notatka" class="hide">
    	<header><h3>Dodaj notatkę</h3></header>
        <form action="<?=site_url('notatka/dodaj')?>" enctype="multipart/form-data" method="post">
        	<label>Treść notatki</label>
            <textarea name="notatka" required></textarea>
        	<label>Dołącz plik</label>
            <input type="file" name="userfile">
            <label>Opis pliku</label>
            <input type="text" name="opis">
        	<input type="hidden" name="partner" value="<?=$dane->id?>">
            <input type="submit" value="Dodaj notatkę">
        </form>
    </div>
    <table class="dane">
    	<tr>
        	<th>Data</th>
            <th>Notatka</th>
            <th>Nazwa pliku</th>
            <th>Administrator</th>
            <th>Narzędzia</th>
        </tr>
    <? foreach($notatka->result() as $dane) { ?>
    	<tr class="notransform">
        	<td><?=$dane->data?></td>
        	<td><?=$dane->notatka?></td>
            <td><a href="<?=site_url('files/documents/'.$dane->plik)?>" target="_blank"><?=$dane->opis?></a></td>
            <td><?=$dane->admin?></td>
        	<td>
                <a href="#plik-notatka-<?=$dane->id?>" rel="facebox" title="Załącz plik do notatki"><i class="fa fa-file"></i></a>
                <a href="#edytuj-notatka-<?=$dane->id?>" rel="facebox" title="Edytuj notatkę"><i class="fa fa-comments-o "></i></a>
                <a href="#usun-notatka-<?=$dane->id?>" rel="facebox" title="Usuń notatkę"><i class="fa fa-close"></i></a>
            </td>
        </tr>
    <? } ?>
    </table>
    <? foreach($notatka->result() as $dane) { ?>
    <div id="plik-notatka-<?=$dane->id?>" class="hide">
    	<header><h3>Załącz plik do notatki</h3></header>
        <form action="<?=site_url('notatka/zalacz_plik')?>" enctype="multipart/form-data" method="post">
        	<label>Dołącz plik</label>
            <input type="file" name="userfile" required>
            <label>Opis pliku</label>
            <input type="text" name="opis" required>
        	<input type="hidden" name="wpis" value="<?=$dane->id?>">
            <input type="submit" value="Załącz plik do notatki">
        </form>
    </div>
    <div id="edytuj-notatka-<?=$dane->id?>" class="hide">
    	<header><h3>Edytuj notatkę</h3></header>
        <form action="<?=site_url('notatka/edytuj')?>" enctype="multipart/form-data" method="post">
        	<label>Treść notatki</label>
            <textarea name="notatka" required><?=$dane->notatka?></textarea>
        	<input type="hidden" name="wpis" value="<?=$dane->id?>">
            <input type="submit" value="Zapisz zmianę">
        </form>
    </div>
    <div id="usun-notatka-<?=$dane->id?>" class="hide">
    	<header><h3>Usuń notatkę</h3></header>
        <i class="fa  fa-close"></i>
        <p>Czy jesteś pewien, że chcesz usunąć wybraną notatkę?</p>
        <p><a href="<?=site_url('notatka/usun/'.$dane->id)?>">Tak, usuń notatkę!</a></p>
    </div>
    <? } ?>

    <header><h4>Dokumenty<a name="dokumenty"></a></h4></header>
    <div class="hr less"></div>
    <aside class="admin">
    	<ul>
        	<li><a href="<?=current_url()?>#dodaj-dokument" rel="facebox" title="Dodaj dokument"><i class="fa fa-file-text"></i></a></li>
        </ul>
    </aside>
    <div id="dodaj-dokument" class="hide">
    	<header><h3>Dodaj dokument</h3></header>
        <form action="<?=site_url('dokumenty/dodaj')?>" enctype="multipart/form-data" method="post">
        	<label>Dołącz dokument</label>
            <input type="file" name="userfile" required>
            <label>Opis dokumentu</label>
            <input type="text" name="opis" required>
        	<input type="hidden" name="partner" value="<?=$this->uri->segment(2)?>">
            <input type="submit" value="Dodaj dokument">
        </form>
    </div>
    <table class="dane">
    	<tr>
        	<th>Data</th>
            <th>Nazwa pliku</th>
            <th>Administrator</th>
            <th>Narzędzia</th>
        </tr>
    <? foreach($dokumenty->result() as $dane) { ?>
    	<tr class="notransform">
        	<td><?=$dane->data?></td>
        	<td><a href="<?=site_url('files/documents/'.$dane->plik)?>" target="_blank"><?=$dane->opis?></a></td>
            <td><?=$dane->admin?></td>
        	<td>
                <a href="#usun-dokument-<?=$dane->id?>" rel="facebox" title="Usuń dokument"><i class="fa fa-close"></i></a>
            </td>
        </tr>
    <? } ?>
    </table>
    <? foreach($dokumenty->result() as $dane) { ?>
    <div id="usun-dokument-<?=$dane->id?>" class="hide">
    	<header><h3>Usunięcie dokumentu</h3></header>
        <i class="fa  fa-close"></i>
        <p>Czy jesteś pewien, że chcesz usunąć dokument <strong><?=$dane->opis?></strong>?</p>
        <p><a href="<?=site_url('dokumenty/usun/'.$dane->id)?>">Tak, usuń dokument!</a></p>
    </div>
    <? } ?>    

    <header><h4>Historia administracyjna<a name="historia-administracyjna"></a></h4></header>
    <div class="hr less"></div>
    <table class="dane">
    	<tr class="notransform">
        	<th>Data</th>
            <th>Administrator</th>
            <th>Wykonane zadanie</th>
        </tr>
    <? foreach($historia->result() as $dane) { ?>
    	<tr>
        	<td><?=$dane->data?></td>
            <td><?=$this->admin($dane->admin)?></td>
        	<td><?=$dane->zadanie?></td>
        </tr>
    <? } ?>
    </table>

</article>

<div class="bottomline"></div>

<? $this->load->view('supplement/footer'); ?>