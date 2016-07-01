//
//  ViewController.swift
//  janken
//
//  Created by YutaIwashina on 2016/06/17.
//  Copyright © 2016年 YutaIwashina. All rights reserved.
//

import UIKit
import GameplayKit

class ViewController: UIViewController {
    let randomSource = GKARC4RandomSource()
    
    @IBOutlet weak var computerImageView: UIImageView!
    @IBOutlet weak var playerImageView: UIImageView!
    @IBOutlet weak var messageLabel: UILabel!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // 180度のラジアンを求める
        let angle:CGFloat = CGFloat((180.0 * M_PI) / 180.0)
        
        // cpuImageViewの回転
        computerImageView.transform = CGAffineTransformMakeRotation(angle)
    }
    
    @IBAction func tapStart() {
        // 両ImageViewにグーを表示
        computerImageView.image = UIImage(named: "gu.jpg")
        playerImageView.image = UIImage(named: "gu.jpg")
        
        // labelに「じゃんけん！」と表示
        messageLabel.text = "じゃんけん！"
    }
    
    @IBAction func tapGu() {
        playerImageView.image = UIImage(named: "gu.jpg")
        doComputer(0);
    }
    @IBAction func tapTyoki() {
        playerImageView.image = UIImage(named: "tyoki.jpg")
        doComputer(1);
    }
    @IBAction func tapPa() {
        playerImageView.image = UIImage(named: "pa.jpg")
        doComputer(2);
    }
    
    func doComputer(player:Int){
        // CPUの手を0~2のランダムな値を求める
        let computer = randomSource.nextIntWithUpperBound(3)
        
        // 勝敗用の文字列を用意します
        var msg = "";
        
        switch computer {
        case 0:
            // ぐー
            computerImageView.image = UIImage(named: "gu.jpg")
            
            switch player{
            case 0:
                // ぐー
                msg = "あいこ"
            case 1:
                // ちょき
                msg = "まけばい"
            case 2:
                // ぱー
                msg = "めでたか"
            default:
                break
            }
            
        case 1:
            // ちょき
            computerImageView.image = UIImage(named: "tyoki.jpg")
            
            switch player{
            case 0:
                // ぐー
                msg = "めでたか"
            case 1:
                // ちょき
                msg = "あいこ"
            case 2:
                // ぱー
                msg = "まけばい"
            default:
                break
            }
            
        case 2:
            // ぱぁ
            computerImageView.image = UIImage(named: "pa.jpg")
            
            switch player{
            case 0:
                // ぐー
                msg = "まけばい"
            case 1:
                // ちょき
                msg = "めでたか"
            case 2:
                // ぱー
                msg = "あいこ"
            default:
                break
            }
            
        default:
            break
        }
        messageLabel.text = msg
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    



}

