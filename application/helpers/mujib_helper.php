<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tanggal'))
{
	function tanggal($date)
	{
		return date("d F Y",strtotime($date)).' at '.date("G:i",strtotime($date));
	}
}

if ( ! function_exists('rupiah'))
{
	function rupiah($int)
	{
		return 'Rp '.number_format($int, 2, ',', '.');
	}
}