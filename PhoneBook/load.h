void load_contacts()
{
  FILE *f1;
  f1= fopen("phonebook.txt","r");
  while (!feof(f1))
  {
    fscanf(f1,"%[^,],",myarr[count].first_name);
    fscanf(f1,"%[^,],",myarr[count].last_name);
    fscanf(f1,"%d-",&myarr[count].birthdate.day);
    fscanf(f1,"%d-",&myarr[count].birthdate.month);
    fscanf(f1,"%d,",&myarr[count].birthdate.year);
    fscanf(f1,"%[^,],",myarr[count].address);
    fscanf(f1,"%[^,],",myarr[count].email);
    fscanf(f1,"%s\n",myarr[count].phone_number);

    count++;

  } fclose(f1);

}