# Import the required modules. 
import RPi.GPIO as GPIO 
import time
# Set the numbering sequence of the pins, then set pins ten and twelve to output, and pin eight to input. 
GPIO.setmode(GPIO.BOARD) 
GPIO.setwarnings(False)

#GPIO.setup(7, GPIO.OUT)
#GPIO.setup(15,GPIO.OUT)
GPIO.setup(12,GPIO.OUT)
GPIO.setup(7,GPIO.OUT)
GPIO.setup(8,GPIO.OUT)
p=GPIO.PWM(12,1)
p.start(1)
GPIO.output(7,GPIO.HIGH)
GPIO.output(8,GPIO.LOW)
print "Stuck"
time.sleep(0.2)
p.stop()
    #GPIO.output(15,GPIO.LOW)
 
#GPIO.output(15,GPIO.HIGH)

#GPIO.setmode(GPIO.BOARD)
#GPIO.setwarnings(False)

#while True:
    
       
    






