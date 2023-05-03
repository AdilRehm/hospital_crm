<?php

function getFOllowUps($data)
{
    switch ($data) {
        case '1':
            return 'تین دن کے بعد کمرہ نمبر 6 میں ریکارڈ کے ساتھ چیک کروایں';
            break;
        case '2':
            return 'ایک ہفتہ کے بعد کمرہ نمبر 6 میں ریکارڈ کے ساتھ چیک کروایں';
            break;
        case '3':
            return 'دو ہفتہ کے بعد کمرہ نمبر 6 میں ریکارڈ کے ساتھ چیک کروایں';
            break;
        case '4':
            return 'ایک ماہ کے بعد کمرہ نمبر 6 میں ریکارڈ کے ساتھ چیک کروایں';
            break;
        
        default:
            return 'N/A';
            break;
    }
}