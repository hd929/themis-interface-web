#include <bits/stdc++.h>
using namespace std;
const int N = 1e6;
int n, a[N];

int main()
{
  freopen("SSORT.INP", "r", stdin);
  freopen("SSORT.OUT", "w", stdout);

  cin >> n;
  for (int i = 0; i < n; i++)
    cin >> a[i];
  sort(a, a + n);
  for (int i = 0; i < n; i++)
    cout << a[i] << ' ';

  return 0;
}
