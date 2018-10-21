package com.example.hasantarek.cseofpust;

import android.content.Intent;
import android.support.v7.app.ActionBar;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

       /* if(getActionBar()!=null)
        {
            getActionBar().hide();
        }*/


    }


    public void userSubmit(View view)
    {
        switch(view.getId())
        {
            case R.id.login:
                startActivity(new Intent(getApplicationContext(),Login.class));
                return;
            case R.id.register:
                startActivity(new Intent(getApplicationContext(),Registration.class));
                return;
        }
    }
}
