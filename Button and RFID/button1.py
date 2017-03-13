import RPi.GPIO as GPIO
import time
import os

GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(8,GPIO.IN, pull_up_down=GPIO.PUD_UP)
try:
    while True:
        if(GPIO.input(8)==0):
            print "Button Worked"
	    os.system('fswebcam image.png')
            break
            time.sleep(0.1)

except KeyboardInterrupt:
    GPIO.cleanup()
