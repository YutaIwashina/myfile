//
//  ViewController.swift
//  zipCode
//
//  Created by YutaIwashina on 2016/06/28.
//  Copyright © 2016年 YutaIwashina. All rights reserved.
//

import UIKit

class ViewController: UIViewController {
    @IBOutlet weak var zipTextField: UITextField!
    @IBAction func tapReturn() {
        guard let ziptext = zipTextField.text else{
            // 値がnil(何も入って来ない)なら終了
            return
        }
        // リクエストするURLを作る
        let urlStr = "http://api.zipaddress.net/?zipcode=\(ziptext)"
        // 確認のためにurlStrをデバッグエリアに表示
        print(urlStr)
    }
    @IBAction func tapSearch() {
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

