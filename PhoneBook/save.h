void save_arr_to_file()
{ FILE *f1;
  f1= fopen("phonebook.txt","w");
  int i;
  for (i=0;i<count;i++)
  {
        fprintf(f1,"%s,",myarr[i].first_name);
        fprintf(f1,"%s,",myarr[i].last_name);
        fprintf(f1,"%d-",myarr[i].birthdate.day);
        fprintf(f1,"%d-",myarr[i].birthdate.month);
        fprintf(f1,"%d,",myarr[i].birthdate.year);
        fprintf(f1,"%s,",myarr[i].address);
        fprintf(f1,"%s,",myarr[i].email);
        fprintf(f1,"%s\n",myarr[i].phone_number);

  } fclose(f1);

}