<?php

namespace App\Controllers;

use App\Models\AuctionModel;

class Auction extends BaseController
{
    public function auction(){
        if (!$this->session->has('user')) {
            return redirect()->to('/login');
        }
        $auction_model = new AuctionModel();
        $auction = $auction_model->findAll();
        return view('auction',[ "auction"=>$auction]);
    }

}