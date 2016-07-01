//
//  ViewController.swift
//  itigobutukerubai
//
//  Created by 岩品裕大 on 2016/06/10.
//  Copyright © 2016年 YutaIwashina. All rights reserved.
//

import UIKit

class ViewController: UIViewController {
    @IBOutlet weak var myLabel: UILabel!

    // ひよこが押されたらmyLabelを変更する
    @IBAction func tapBtn(sender: AnyObject) {
        myLabel.text = "イチゴぶつけるばい"
    }
    override func viewDidLoad() {
        super.viewDidLoad()
        // Do any additional setup after loading the view, typically from a nib.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }


}

