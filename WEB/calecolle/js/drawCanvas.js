// 変数の定義
var line;					// 現在の線
var lines = new Array();	// すべての線
var point;					// 線を構成するポイント
var color;					// 現在の色
// 描画中かを表すフラグ
var isDrawing = false;
var width;					// 現在の線幅
// 白黒で描画するかを表すフラグ
var isBW = false;

	$(function(){
		
		// 色
		color = $("input[name='color']:checked").val();
		// 線幅
		width = $("#width option:selected").val();
		
		// マウスボタン
		$('#myCanvas').mousedown(function(e){
			isDrawing = true;							// 描画開始
			points = new Array();
			// オフセットを取得
			var offset = $("#myCanvas").offset();
			var x = e.pageX - offset.left;
			var y = e.pageY - offset.top;
			points.push(new Point(x, y));
			
			// Lineオブジェクトを生成
			line = new Line(points, color, width);
			// linesに線を追加
			lines.push(line);
		});
		
		// マウス移動
		$('#myCanvas').mousemove(function(e){
			if(!isDrawing) return;
			
			// マウスの座標を取得
			var offset = $("#myCanvas").offset();
			var x = e.pageX - offset.left;
			var y = e.pageY - offset.top;
			
			// ひとつ前のポイント
			var prevPoint = line.points[line.points.length -1];
			
			// 線を描く
			line.points.push(new Point(x, y));
			$('#myCanvas').drawLine({
				strokeStyle: line.color,
				strokeWidth: line.width,
				strokeCap: "round",
				x1: prevPoint.x,
				y1: prevPoint.y,
				x2: x,
				y2: y
			});
			
			// ポイントを追加
			
		});
		
		// マウスアップ
		$('#myCanvas').mouseup(function(event){
			isDrawing = false;
		});
		
		// すべて消去
		$('#clearButton').click(function(event){
			lines.length = 0;	//要素数を0に
			$('#myCanvas').clearCanvas();
		})
		
		// 色選択
		$('input[name="color"]').change(function(){
			color = $(this).val();
			})
			
			// 線幅選択
			$('#width').change(function(){
				width = $('#width option:selected').val();
		})
		
		// ひとつ前の線を消す
		$('#undoButton').click(function(){
			if(lines.length > 0){
				lines.pop();
				drawAll();
			}
		})
		
		// 別ウィンドウに画像化
		$('#imageButton').click(function(){
			window.open($('#myCanvas')[0].toDataURL());
		});
		
		// 投稿ボタン
		$('#postButton').click(function(){
			
			var data = {};		
			var img_data = $('#myCanvas').get(0).toDataURL();
			img_data = img_data.replace(/^data:image\/png;base64,/, '');
			
			data.image = img_data;
			
			// save.phpにPOST送信
			$.ajax({
				url: 'save.php',
				type: 'POST',
				data: data,
				success: function(data){
					alert("投稿されました");
				},
				 error(jqXHR, textStatus, errorThrown) {
					// 失敗時の処理
				}
			});
		});
		
	});

	// すべての線を描画
	function drawAll(){
		$('#myCanvas').clearCanvas()
		
		// 線を取り出す
		for(i=0;i<lines.length;i++){
			var line = lines[i];
			var lineColor = line.color;
			var lineWidth = line.width;
			
			// 点を2つずつ取り出して描画する
			for(j=0;j<line.points.length -1;j++){
				point1 = line.points[j];
				point2 = line.points[j+1];
				
				// 2点間の線を引く
				$('#myCanvas').drawLine({
					strokeStyle: lineColor,
					strokeWidth: lineWidth,
					strokeCap: "round",
					x1: point1.x,
					y1: point1.y,
					x2: point2.x,
					y2: point2.y
				})
			}
		}
	}
		
	
	// Lineオブジェクト
	function Line(points, color, width){
		this.width = width;
		this.points = points;
		this.color = color;
	}
	
	// Pointオブジェクト
	function Point(x, y){
		this.x = x;
		this.y = y;
	}