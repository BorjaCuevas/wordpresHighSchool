(function(){
    
    var canvasList = document.getElementsByTagName('canvas');
    var color = '#c52d2f';
    
    for( var i = 0; i < canvasList.length; i++){
        
        var max = canvasList[i].getAttribute('data-text');   
        
        if( canvasList[i].getAttribute('class') === 'gauge' ){
            drawGauge(canvasList[i], max, color);
        } else if( canvasList[i].getAttribute('class') === 'skillbar' ){
            var skill = canvasList[i].getAttribute('data-skill');
            drawSkillBar(canvasList[i], skill, max, color);
        }
    }
    
    function drawGauge(canvas, max, color){
        
        var mainGauge = canvas.getContext('2d');
        var currentEndAngle = 1;
        var currentStartAngle = 1;
        var gauge = setInterval(draw, 15);
        var counter = 0;
        function draw(){
            if( counter > max ){

            } else {
                mainGauge.clearRect(0, 0, canvas.width, canvas.height);     
                mainGauge.beginPath();
                mainGauge.arc(100,100,75,1*Math.PI,0);
                mainGauge.lineWidth = 50;
                mainGauge.strokeStyle = '#333333';
                mainGauge.stroke();
                mainGauge.font = "24px Open Sans";
                mainGauge.fillStyle = '#333333';
                
                if( counter === 100 ){
                    mainGauge.fillText(counter + '%', 68, 100);    
                } else {
                    mainGauge.fillText(counter + '%', 76, 100);
                }
                
                var startAngle = currentStartAngle * Math.PI;
                var endAngle = currentEndAngle * Math.PI;
                currentEndAngle += 0.01;
                var innerGauge = canvas.getContext('2d');
                innerGauge.beginPath();
                innerGauge.arc(100,100,75,startAngle,endAngle);
                innerGauge.lineWidth = 50;
                innerGauge.strokeStyle = color;
                innerGauge.stroke();
            }
            counter++;            
        }
    }
    
    function drawSkillBar(canvas, skill, max, color){
        
        var mainBar = canvas.getContext('2d');
        var currentEnd = 0;
        var bar = setInterval(draw, 15);
        var counter = 0;
        function draw(){
            if( counter > max ){
                
            } else {
                mainBar.clearRect(0, 0, canvas.width, canvas.height);
                mainBar.beginPath();
                mainBar.moveTo(0, 25);
                mainBar.lineTo(300, 25);
                mainBar.lineWidth = 50;
                mainBar.strokeStyle = '#333333';
                mainBar.stroke();
                
                
                var innerBar = canvas.getContext('2d');
                innerBar.beginPath();
                innerBar.moveTo(0, 25);
                innerBar.lineTo(currentEnd, 25);
                currentEnd += 3;
                innerBar.lineWidth = 50;
                innerBar.strokeStyle = color;
                innerBar.stroke();
                innerBar.font = "18px OpenSans-Semibold";
                innerBar.fillStyle = 'white';
                innerBar.fillText(skill + ' ' + counter + '%', 10, 32);                
            }
            counter++;
        }
    }
})();