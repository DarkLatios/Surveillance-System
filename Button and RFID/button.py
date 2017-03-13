import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(8,GPIO.IN)
GPIO.setup(7,GPIO.IN)
pre=0
prev=0

while True:
    input=GPIO.input(8)
    input1=GPIO.input(7)
    if(not (pre) and input):
        print 'Button Pressed = 1'
    pre=input
    time.sleep(0.05)
    if(not (prev) and input1):
        print 'Button Pressed = 2'
    prev=input1
    time.sleep(0.05)
        
    

    
